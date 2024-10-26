<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TicketController extends Controller
{
    public function ticket_book(Request $request)
    {
        // Check if the user is logged in
        if (!Session::has('user_id')) {
            return response()->json(['error' => 'User not logged in.'], 401); // Return a JSON error response
        }
    
        // Retrieve user details from session
        $userId = Session::get('user_id');
    
        // Get selected seats from the request (query string)
        $seats = json_decode($request->query('seats'), true);
    
        if (empty($seats)) {
            return response()->json(['error' => 'No seats selected.'], 400);
        }
    
        // Fetch the 'date' from the query string (use query, not input)
        $bookingDate = $request->query('date');
        $totalPrice = $request->query('price');
    
        if (empty($bookingDate)) {
            return response()->json(['error' => 'No booking date provided.'], 400);
        }
    
        // Fetch bus ID from the request (ensure it's passed from the client-side)
        $busId = $request->query('busId');
        if (!$busId) {
            return response()->json(['error' => 'Bus ID not provided.'], 400);
        }
    
        try {
            // Begin a database transaction
            DB::beginTransaction();
    
            // Check which seats are already occupied
            $newlyOccupiedSeats = $this->updateOccupiedSeats($busId, $bookingDate, $seats);
    
            // If no new seats were added, return an error response
            if (empty($newlyOccupiedSeats)) {
                DB::rollBack();
                return response()->json(['error' => 'All selected seats are already occupied.'], 400);
            }
    
            // Generate ticket numbers and store booking information for the newly occupied seats only
            $ticketNumbers = [];
            foreach ($newlyOccupiedSeats as $seat) {
                // Generate a unique ticket number
                $ticketNumber = $this->generateUniqueTicketNumber();
                $ticketNumbers[] = $ticketNumber;
    
                // Insert ticket details into the tickets table (assuming it exists)
                DB::table('tickets')->insert([
                    'user_id' => $userId,
                    'bus_id' => $busId,
                    'ticket_number' => $ticketNumber,
                    'date' => $bookingDate,
                ]);
            }
    
            // Convert seat numbers and ticket numbers to comma-separated strings
            $seatNumbersStr = implode(',', $newlyOccupiedSeats);
            $ticketNumbersStr = implode(',', $ticketNumbers);
    
            // Update user tickets
            $this->updateUserTickets($userId, $ticketNumbers);
    
          // Insert the data and get the auto-incremented ID
        $cartId = DB::table('cart')->insertGetId([
              'user_id' => $userId,
              'ticket_number' => $ticketNumbersStr, // Store as comma-separated string
              'bus_id' => $busId,
              'date' => $bookingDate,
              'seat_numbers' => $seatNumbersStr, // Store as comma-separated string
              'price' => $totalPrice,
            ]);


            // Retrieve the current transaction_ids from the users table
            $currentTransactionIds = DB::table('users')->where('id', $userId)->value('transaction_ids');

            // Check if current transaction_ids is empty or null
            if ($currentTransactionIds) {
                // If not empty, append the new cartId with a comma
                $updatedTransactionIds = $currentTransactionIds . ',' . $cartId;
            } 
            else {
                // If empty, just use the new cartId
                $updatedTransactionIds = $cartId;
            }

            // Update the users table with the new transaction_ids string
            DB::table('users')->where('id', $userId)->update([
                'transaction_ids' => $updatedTransactionIds
            ]);






    
            // Commit the transaction
            DB::commit();
    
            // Return the ticket numbers as a response
            return response()->json(['ticket_numbers' => $ticketNumbers], 200);
        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollBack();
            return response()->json(['error' => 'Failed to book seats. Please try again.', 'message' => $e->getMessage()], 500);
        }
    }
    
    
    private function generateUniqueTicketNumber()
    {
        // Generate a ticket number
        do {
            // Get the current timestamp
            $timestamp = time();
            
            // Generate a random number
            $randomNumber = mt_rand(10, 99); // Change range for desired length
            
            // Combine timestamp and random number for a shorter ID
            $ticketNumber = 'T-' . strtoupper(dechex($timestamp) . $randomNumber);
        } while (DB::table('tickets')->where('ticket_number', $ticketNumber)->exists()); // Check if it exists
    
        return $ticketNumber;
    }
    

    private function updateOccupiedSeats($busId, $bookingDate, $seats)
    {
        // Convert the seat numbers array to a comma-separated string
        $newOccupiedSeats = $seats;
    
        // Check if there are existing occupied seats for the given bus and date
        $existingRecord = DB::table('bus_booking')
            ->where('bus_id', $busId)
            ->where('date', $bookingDate)
            ->first();
    
        $occupiedSeatsArray = [];
        if ($existingRecord) {
            // If the record exists, get the occupied seats
            $existingSeats = $existingRecord->seat_no_occupied;
            if ($existingSeats) {
                $occupiedSeatsArray = explode(',', $existingSeats);
            }
        }
    
        // Filter out the seats that are already occupied
        $newlyOccupiedSeats = array_diff($newOccupiedSeats, $occupiedSeatsArray);
    
        if (!empty($newlyOccupiedSeats)) {
            // Add new occupied seats to the existing ones
            $updatedSeats = array_merge($occupiedSeatsArray, $newlyOccupiedSeats);
            $updatedSeatsStr = implode(',', $updatedSeats);
    
            // Update the seat_no_occupied column
            if ($existingRecord) {
                DB::table('bus_booking')
                    ->where('bus_id', $busId)
                    ->where('date', $bookingDate)
                    ->update(['seat_no_occupied' => $updatedSeatsStr]);
            } else {
                // If no record exists, create a new entry with occupied seats
                DB::table('bus_booking')->insert([
                    'bus_id' => $busId,
                    'date' => $bookingDate,
                    'seat_no_occupied' => $updatedSeatsStr,
                ]);
            }
        }
    
        // Return the newly occupied seats that were not already taken
        return $newlyOccupiedSeats;
    }
    
    private function updateUserTickets($userId, $ticketNumbers)
    {
        // Fetch the current ticket_id from the user record
        $existingTickets = DB::table('users')->where('id', $userId)->value('ticket_id');

        // Convert the new ticket numbers to a comma-separated string
        $newTickets = implode(',', $ticketNumbers);

        if ($existingTickets) {
            // Append new tickets to existing tickets, separated by a comma
            $updatedTickets = $existingTickets . ',' . $newTickets;
        } else {
            // If no tickets exist, simply use the new tickets
            $updatedTickets = $newTickets;
        }

        // Update the users table with the new ticket_id value
        DB::table('users')
            ->where('id', $userId)
            ->update(['ticket_id' => $updatedTickets]);
    }

    public function payment(Request $request)
{
    // Check if the user is logged in
    if (!Session::has('user_id')) {
        return response()->json(['error' => 'User not logged in.'], 401);
    }

    // Retrieve user details from session
    $userId = Session::get('user_id');

    // Get selected seats from the request (query string)
    $seats = json_decode($request->query('seats'), true);
    if (empty($seats)) {
        return response()->json(['error' => 'No seats selected.'], 400);
    }

    // Fetch the 'date' from the query string
    $bookingDate = $request->query('date');
    if (empty($bookingDate)) {
        return response()->json(['error' => 'No booking date provided.'], 400);
    }

    // Fetch bus ID from the request
    $busId = $request->query('busId');
    if (!$busId) {
        return response()->json(['error' => 'Bus ID not provided.'], 400);
    }

    // Fetch bus details from the database using busId
    $bus = DB::table('bus')->where('bus_id', $busId)->first();
    if (!$bus) {
        return response()->json(['error' => 'Bus not found.'], 404);
    }

    // Calculate the total price
    $pricePerSeat = $bus->price; // Assuming there's a 'price' column in the buses table
    $totalSeats = count($seats);
    $totalPrice = $totalSeats * $pricePerSeat;

    // Optionally, you can pass additional data to the view if needed
    return view('cart-pay', [
        'bus' => $bus,           // Bus details
        'seats' => $seats,       // Selected seats
        'totalPrice' => $totalPrice, // Calculated total price
        'bookingDate' => $bookingDate // The booking date
    ]);
}

}
