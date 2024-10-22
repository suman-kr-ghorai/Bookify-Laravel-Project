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
            // Fetch the user by email or phone number
            $user = DB::table('users')
                ->where('email', $req->input('email'))
                // ->orWhere('phone', $req->input('email'))
                ->first();

            // If user is not found
            if (!$user) {
                return response()->json(['message' => 'Invalid credentials. Please check your email/phone and try again.'], 404);
            }

            // Check if the provided password matches the hashed password in the database
            if (!Hash::check($req->password, $user->password)) {
                return response()->json(['message' => 'Invalid credentials. Please check your password and try again.'], 401);
            }

            // Login successful, return success message or token
            return response()->json(['message' => 'Login successful', 'user' => $user], 200);

        } catch (Exception $e) {
            // Log the error for debugging
            Log::error('Login error: ' . $e->getMessage());

            // Return a generic error response
            return response()->json(['message' => 'An error occurred during login. Please try again later.'], 500);
        }
    }
}
