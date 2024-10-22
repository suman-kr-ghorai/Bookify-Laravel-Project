<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function bookSeats(Request $request)
    {
        // Validate the request
        $request->validate([
            'seats' => 'required|array',
            'seats.*' => 'exists:seats,seat_number', // Validate each seat number
            'total_price' => 'required|numeric|min:0', // Validate total price
        ]);

        $ticketNumbers = [];
        $totalPrice = $request->total_price;

        // Start a transaction
       // DB::beginTransaction();
        try {
            foreach ($request->seats as $seatNumber) {
                // Update seat as occupied
                $seat = DB::table('seats')->where('seat_number', $seatNumber)->first();

                if ($seat) {
                    // Mark the seat as occupied
                    DB::table('seats')->where('seat_number', $seatNumber)->update(['is_occupied' => true]);

                    // Generate a unique ticket number
                    $ticketNumber = $this->generateUniqueTicketNumber();

                    // Store the ticket in the database
                    DB::table('tickets')->insert([
                        'seat_number' => $seatNumber,
                        'ticket_number' => $ticketNumber,
                        'created_at' => now(),
                        
                    ]);

                    // Collect the ticket number
                    $ticketNumbers[] = $ticketNumber;
                }
            }

            // Commit the transaction
           // DB::commit();

            return response()->json(['ticket_numbers' => $ticketNumbers, 'total_price' => $totalPrice]);
        } catch (\Exception $e) {
            // Rollback the transaction on error
            //DB::rollBack();
            return response()->json(['error' => 'Failed to book seats: ' . $e->getMessage()], 500);
        }
    }

    private function generateUniqueTicketNumber()
    {
        // Generate a ticket number
        do {
            $ticketNumber = rand(100000, 999999); // Generate a random 6-digit ticket number
        } while (DB::table('tickets')->where('ticket_number', $ticketNumber)->exists()); // Check if it exists

        return $ticketNumber;
    }
}