<?php

namespace App\Http\Controllers;

use Session;
use DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showTickets(Request $req)
    {
        $userId = Session::get('user_id');
        if (!$userId) {
            return view('login'); // Redirect to login if user is not authenticated
        }
        
        $user_type = Session::get('user_type');
        if ($user_type !== "admin") {
            return view('home'); // Redirect to home if user is not an admin
        } else {
            $tickets = DB::table('tickets')->get();
            
            // Fetch user and bus data for each ticket
            $ticketData = $tickets->map(function ($ticket) {
                $user = DB::table('users')->where('id', $ticket->user_id)->first();
                $bus = DB::table('bus')->where('bus_id', $ticket->bus_id)->first();
                
                // Add the user and bus details to each ticket object
                $ticket->user = $user;
                $ticket->bus = $bus;
                
                return $ticket;
            });

            return view('admin-all-tickets', ["tickets" => $ticketData]);
        }
    }
}
