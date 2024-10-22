<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SeatController extends Controller
{
   
 function showBusSeats($busId){
    $seats = DB::table('seats')->where('bus_id', $busId)->orderBy('row')->orderBy('columns')->get();
    return view('bus_seat_layout', compact('seats'));

}
}