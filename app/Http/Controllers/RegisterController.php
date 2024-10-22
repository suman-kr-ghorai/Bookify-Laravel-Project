<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Exception;

class RegisterController extends Controller
{
    //
    function register(Request $req)
    {
        try {
            // Check if the email is already registered
            $existingUser = DB::table('users')->where('email', $req->email)->first();

            if ($existingUser) {
                return response()->json(['message' => 'Email already registered. Please use another email.'], 409); // Conflict status code
            }

            // Inserting the new user data
            $result = DB::table('users')->insert([
                "name" => $req->fullName,
                "email" => $req->email,
                "phone" => $req->phone,
                "password" => Hash::make($req->password),  // Hash the password for security
                "DOB" => $req->dob,
                "user-type" => "user",
                "ticket-id" => "",
            ]);

            if ($result) {
                // Success response
                return response()->json(['message' => 'New user created successfully'], 201);
            } else {
                // In case insertion failed
                return response()->json(['message' => 'User registration failed. Please try again.'], 500);
            }

        } catch (Exception $e) {
            // Log the error for debugging
            Log::error('User registration error: ' . $e->getMessage());

            // Return error response with exception message
            return response()->json(['message' => 'An error occurred during registration. Please try again later.'], 500);
        }
    }
}
