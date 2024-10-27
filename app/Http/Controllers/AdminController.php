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
    public function alluser(){
        $userId = Session::get('user_id');
        if (!$userId) {
            return view('login'); // Redirect to login if user is not authenticated
        }
        $user_type=Session::get('user_type');
        if($user_type=="admin"){
            $users=DB::table('users')->get();
            $tickets=DB::table('tickets')->get();
            $bus=DB::table('bus')->get();
            $cart=DB::table('cart')->get();

        return view('admin',['users'=>$users,'tickets'=>$tickets,'bus'=>$bus,"cart"=>$cart]);
        }
        else{
            return view ('home');
        }
    }

    function alluserShow(){
        $userId = Session::get('user_id');
        if (!$userId) {
            return view('login'); // Redirect to login if user is not authenticated
        }
        $user_type=Session::get('user_type');
        if($user_type=="admin")
        {
        $users=DB::table('users')->get();
        return view('edit-users',["users"=>$users]);
        }
    }


   // Show the edit form for a specific user
    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        
        if (!$user) {
            return redirect()->view('edit-users')->with('error', 'User not found.');
        }

        return view('users.edit', ['user' => $user]);
    }

    // Update the user in the database
    public function update(Request $request, $id)
{
    // Validate input data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'phone' => 'required|numeric|digits_between:10,15',
        'dob' => 'required|date',
        'password' => 'nullable|confirmed|min:8', // password can be empty but must match confirmPassword if provided
    ]);

    // Prepare the data for update
    $updateData = [
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'phone' => $request->input('phone'),
        'dob' => $request->input('dob'),
        'updated_at' => now(),
    ];

    // Check if password is provided, then hash it and add it to the update data
    if ($request->filled('password')) {
        $updateData['password'] = bcrypt($request->input('password'));
    }

    // Update user record in the database
    DB::table('users')
        ->where('id', $id)
        ->update($updateData);

    // Redirect back to edit-users page with a success message
    return view('home');
}


    // Delete a user from the database
    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();

        return redirect()->view('edit-users')->with('success', 'User deleted successfully!');
    }
    public function block($id)
    {
        // Find the user by ID and update the auth column to 1
        DB::table('users')
            ->where('id', $id)
            ->update(['auth' => 1, 'updated_at' => now()]); 
    
        return "User with ID $id has been blocked.";
    }
    public function unblock($id)
    {
        // Find the user by ID and update the auth column to 1
        DB::table('users')
            ->where('id', $id)
            ->update(['auth' => 0, 'updated_at' => now()]); 
    
        return "User with ID $id has been unblocked.";
    }
    
}
