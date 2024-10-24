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

    // Retrieve seats for the specified bus ID
    $seats = DB::table('seats')->where('bus_id', $busId)->orderBy('row')->orderBy('columns')->get();

    // Retrieve bus details for the specified bus ID
    $bus = DB::table('bus')->where('bus_id', $busId)->first(); // Make sure you have the correct column name

    // Check if bus details were found
    if (!$bus) {
        return redirect('/search')->with('message', 'Bus not found.'); // Redirect if no bus is found
    }

    // Return the view with seats and bus data
    return view('bus_seat_layout', compact('seats', 'bus'));
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
