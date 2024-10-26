<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class ShowController extends Controller
{
    public function showTicketDetails()
    {
        try {
            // Retrieve user details from session
            $userId = Session::get('user_id');
            if (!$userId) {
                return view('login'); // Return to login if user is not authenticated
            }

            // Retrieve user records from the 'users' table
            $userRecords = DB::table('users')->where('id', $userId)->first();

            // Check if user records exist
            if (!$userRecords) {
                return back()->withErrors(['error' => 'User not found.']);
            }

            // Extract transaction IDs from the user record
            $transactionIds = $userRecords->transaction_ids;

            // Split the comma-separated transaction IDs into an array
            $allIds = explode(',', $transactionIds);

            // Query the cart table to get details for each transaction ID
            $tickets = DB::table('cart')
                ->whereIn('id', $allIds) // Use the correct column for the transaction ID
                ->select('bus_id', 'price', 'date','ticket_number')
                ->get();

           // Check if tickets were found
            if ($tickets->isEmpty()) {
                return back()->withErrors(['error' => 'No tickets found for the given transaction IDs.']);
            }

            // Initialize an array to hold bus details
            $busDetails = [];

            // Retrieve bus details for each ticket
            foreach ($tickets as $ticket) {
                $bus = DB::table('bus')->where('bus_id', $ticket->bus_id)->first();
                if ($bus) {
                    $busDetails[] = $bus; // Add bus details to the array
                } else {
                    // Handle the case where the bus is not found (optional)
                    $busDetails[] = null; // Or some default value/message
                }
            }

            // Pass the tickets and bus details to the Blade view
            return view('ticket-details', ['tickets' => $tickets , 'buses' => $busDetails]);

        } catch (\Exception $e) {
            // Handle exceptions and pass error message to the view
            return view('ticket-details')->withErrors(['error' => 'Something went wrong: ' . $e->getMessage()]);
        }
    }
}
