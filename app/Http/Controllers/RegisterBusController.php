<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;

class RegisterBusController extends Controller
{
    public function registerBuses(Request $request)
    {
        try {
            // Validate the incoming request data
            $request->validate([
                'name' => 'required|string',
                'phone' => 'required|numeric',
                'source' => 'required|string',
                'destination' => 'required|string',
                'time' => 'required|string',
                'price' => 'required|numeric',
                'category' => 'required|string',
                'rating' => 'required|numeric|min:0|max:5',
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'to_details' => 'required|string',
                'from_details' => 'required|string',
                'capacity' => 'required|integer',
            ]);

            // Handle the photo upload
            $photoPath = null;  // Initialize photo path
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('photos', 'public');
            }
            // else{
            //     $photoPath=$request->input('photo');
            // }

            // Insert bus data into the database
            DB::table('bus')->insert([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'source' => $request->input('source'),
                'destination' => $request->input('destination'),
                'time' => $request->input('time'),
                'price' => $request->input('price'),
                'category' => $request->input('category'),
                'rating' => $request->input('rating'),
                'photo' => $photoPath,
                'to_details' => $request->input('to_details'),
                'from_details' => $request->input('from_details'),
                'capacity' => $request->input('capacity'),
            ]);

            return response()->json(['message' => 'Bus Added'], 200);
        } catch (Exception $e) {
            // Log the error for debugging
            Log::error('Bus registration error: ' . $e->getMessage());
        
            // Return error response with the actual exception message for testing (remove in production)
            return response()->json(['message' => 'An error occurred during registration. Details: ' . $e->getMessage()], 500);
        }
        
    }
}
