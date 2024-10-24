<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    // Function to show bus seats
    public function showBusSeats(Request $request, $busId)
    {
        // Check if the user is logged in
        if (!$request->session()->has('user_id')) {
            // Redirect to the sign-in page if not logged in
            return redirect('/login')->with('message', 'Please log in to access this page.');
        }
    
        // Retrieve the date from the request
        $date = $request->query('date');
    
        // Fetch seat_no_occupied for the given bus ID and date from bus_booking table
        $booking = DB::table('bus_booking')
            ->where('bus_id', $busId)
            ->where('date', $date)
            ->select('seat_no_occupied')
            ->first();
    
        // Initialize seats_occupied as zero if no booking is found
        $seats_occupied = 0;
        $seatNumbers = [];
    
        // Check if booking data exists
        if ($booking) {
            // If seat_no_occupied exists, convert it into an array
            if (!empty($booking->seat_no_occupied)) {
                $seatNumbers = explode(',', $booking->seat_no_occupied);
            }
            $seats_occupied = count($seatNumbers);
        }
    
        // Retrieve seats for the specified bus ID
        $seats = DB::table('seats')->where('bus_id', $busId)->orderBy('row')->orderBy('columns')->get();
    
        // Retrieve bus details for the specified bus ID
        $bus = DB::table('bus')->where('bus_id', $busId)->first();
    
        // Check if bus details were found
        if (!$bus) {
            return redirect('/search')->with('message', 'Bus not found.');
        }
    
        // Return the view with seats, bus data, and seat numbers
        return view('bus_seat_layout', compact('seats', 'bus', 'seatNumbers', 'seats_occupied', 'date')); // Pass the date to the view if needed
    }
    


    // Function for creating seats (admin access only)
    public function seatCreate(Request $request)
    {
        // Check if user is admin
        if ($request->session()->get('user_type') === 'admin') {
            // If user is admin, redirect them to the seat creation page
            return view('seatCreate'); // Corrected the path to remove the leading slash
        }

        // If not admin, show the homepage
        return view('home');
    }
}
