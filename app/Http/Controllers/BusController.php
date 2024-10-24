<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Exception;


class BusController extends Controller
{
     function getBuses(Request $request)
    {
        $source = $request->input('source');
        $destination = $request->input('destination');

        $query = DB::table('bus');

        // Apply conditions based on the input
        if ($source && $destination) {
            // If both source and destination are provided, fetch buses with both
            $buses = $query->where('source', $source)
                           ->where('destination', $destination)
                           ->get();
        } elseif ($source) {
            // If only source is provided, fetch buses with that source
            $buses = $query->where('source', $source)
                           ->get();
        } elseif ($destination) {
            // If only destination is provided, fetch buses with that destination
            $buses = $query->where('destination', $destination)
                           ->get();
        } else {
            // If neither is provided, return an empty response or handle as needed
            // return response()->json([]);
            $buses = $query->get();
        }

        return response()->json($buses);
    }


    


function busStore(Request $request)
{
    // Assuming the bus_id is either passed or available in session
    $bus_id = $request->session()->get('bus_id'); // Get the bus_id from the session

    $rows = $request->input('rows');           // Number of rows
    $columns = $request->input('columns');     // Number of columns per row
    $seats = $request->input('seats');         // Seat number information

    try {

        if ($rows && $columns && $bus_id) {
            for ($i = 1; $i <= $rows; $i++) {
                $numberOfColumns = $columns[$i]; // Get the number of columns for this row

                for ($j = 1; $j <= $numberOfColumns; $j++) {
                    $seatNumber = isset($seats[$i][$j]) ? $seats[$i][$j] : 0; // Get the seat number, or 0 if it's a gap
                    $is_gap = ($seatNumber == 0) ? 1 : 0; // If seat number is 0, it's a gap

                    // Insert data into the table
                    DB::table('seats')->insert([
                        'bus_id'      => $bus_id,
                        'row'         => $i,                       // Row number
                        'columns'     => $j,                       // Number of columns in the row
                        'seat_number' => $seatNumber,              // Seat number or 0 for gap
                        'is_gap'      => $is_gap,                  // 1 if it's a gap
                    ]);
                }
            }
            $request->session()->forget('bus_id');
        $message = 'Bus seat configuration saved successfully!';
        }
        else{
            $message = 'Bus seat configuration could not be saved!';
        }


    } catch (Exception $e) {
      
        $message = 'An error occurred while saving bus seat configuration. Please try again.';
    }

    // Return to the message view with the appropriate message
    return view('message', ['message' => $message]);
}

    


function add_buses(Request $request) {
    // Check if user is admin
    if ($request->session()->get('user_type') === 'admin') {
       

        // Pass the seat layout array to the view
        return view('add_buses');
    }

    // If not admin, show the homepage
    return view('home'); 
}
    
}
