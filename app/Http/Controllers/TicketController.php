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

            // Generate ticket numbers and store booking information
            $ticketNumbers = [];
            foreach ($seats as $seat) {
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

            // Update the seat_no_occupied column in the bus_booking table
            $this->updateOccupiedSeats($busId, $bookingDate, $seats);
            $this->updateUserTickets($userId, $ticketNumbers);

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
            $ticketNumber = 'T-' . strtoupper(uniqid());
        } while (DB::table('tickets')->where('ticket_number', $ticketNumber)->exists()); // Check if it exists

        return $ticketNumber;
    }

    private function updateOccupiedSeats($busId, $bookingDate, $seats)
    {
        // Convert the seat numbers array to a comma-separated string
        $newOccupiedSeats = implode(',', $seats);

        // Check if there are existing occupied seats for the given bus and date
        $existingRecord = DB::table('bus_booking')
            ->where('bus_id', $busId)
            ->where('date', $bookingDate)
            ->first();

        if ($existingRecord) {
            // If the record exists, update the seat_no_occupied column
            $existingSeats = $existingRecord->seat_no_occupied;
            $updatedSeats = $existingSeats ? $existingSeats . ',' . $newOccupiedSeats : $newOccupiedSeats;

            DB::table('bus_booking')
                ->where('bus_id', $busId)
                ->where('date', $bookingDate)
                ->update(['seat_no_occupied' => $updatedSeats]);
        } else {
            // If no record exists, create a new entry with occupied seats
            DB::table('bus_booking')->insert([
                'bus_id' => $busId,
                'date' => $bookingDate,
                'seat_no_occupied' => $newOccupiedSeats,
            ]);
        }
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
}
