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

            // Insert bus data into the database
            $busId = DB::table('bus')->insertGetId([  // Use insertGetId to get the inserted ID
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

            $request->session()->put('bus_id', $busId);//add bus id into session variable

            // Redirect to the /seats route for creating layout
            return redirect()->to('/seat');

        } catch (Exception $e) {
            // Log the error for debugging
            Log::error('Bus registration error: ' . $e->getMessage());
        
            // Return error response with the actual exception message for testing (remove in production)
            return redirect()->to('/add_buses')->withErrors(['message' => 'An error occurred during registration.']);
        }
    }
}
