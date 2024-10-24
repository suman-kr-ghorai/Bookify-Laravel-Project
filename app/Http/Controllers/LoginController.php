<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Exception;

class LoginController extends Controller
{
    //
    function login_check(Request $req)
       {
         try {
        // Fetch the user by email
         $user = DB::table('users')
            ->where('email', $req->input('email'))
            ->first();

        // If user is not found
        if (!$user) {
            return response()->json(['message' => 'Invalid credentials. Please check your email/phone and try again.'], 404);
                    }

        // Check if the provided password matches the hashed password in the database
        if (!Hash::check($req->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials. Please check your password and try again.'], 401);
        }

          // Check if the user's auth status is 0
          if ($user->auth !== 0) {
            return response()->json(['message' => 'Your account is not authorized to login. Please contact support.'], 403);
        }

        // Store user data in session
        session([
            'user_id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'ticket_id' => $user->ticket_id, // Assuming ticket_id is a field in your users table
            'user_type'=>$user->user_type
        ]);

        // Login successful, return success message or token
        //return response()->json(['message' => 'Login successful', 'user' => $user], 200);
        return view('home');

        } catch (Exception $e) {
        // Log the error for debugging
        Log::error('Login error: ' . $e->getMessage());

        // Return a generic error response
        return response()->json(['message' => 'An error occurred during login. Please try again later.'], 500);
         }
    }

    public function Login(Request $request)
    {
        // Check if user is already logged in by checking the session variable 'user_id'
        if ($request->session()->has('user_id')) {
            // If user is logged in, redirect them to the home page
            return redirect('/')->with('message', 'You are already logged in.');
        }

        // If not logged in, show the login form
        return view('login'); // Replace 'auth.login' with your login view
    }
}
