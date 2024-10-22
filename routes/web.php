<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\RegisterBusController;
use App\Http\Controllers\SeatController;



///////////////////////////////////////////////////////////////////////
//                       VIEW PAGES FOR FRONT-END
////////////////////////////////////////////////////////////////////////
Route::view('/','home');
Route::view('/register','register');
Route::view('/login','login');
Route::view('/booking','booking');
Route::view('/search','search');
Route::view('/cart','cart-pay');
Route::view('/all_buses','all_buses');
Route::view('/seat','seatCreate');







///////////////////////////////////////////////////////////////////////
//                       
//                           API + REGISTERING FORMS LOGIC
//                       
////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////
//                       BUS SEAT LAYOUT FORM AND VIEWING
////////////////////////////////////////////////////////////////////////
Route::post('/bus.store',[BusController::class,'busStore']);
//form to create a layout for buses and store in database   **only can be accesed by admin**

Route::get('/bus/{busId}', [SeatController::class, 'showBusSeats']);
//route to get every bus layout by providing bus ID



///////////////////////////////////////////////////////////////////////
//                       LOGIN AND REGISTRATION
////////////////////////////////////////////////////////////////////////

// // ****************REGISTER user INSERT API***************************
Route::post('/new-user/register', [RegisterController::class,'register']);
// ****************LOGIN CHECK API***************************
Route::post('/user-login', [LoginController::class,'login_check']);



///////////////////////////////////////////////////////////////////////
//                       BUS DETAILS API(SEARCH AND ADD BUS)
////////////////////////////////////////////////////////////////////////
Route::get('/buses', [BusController::class, 'getBuses']);
//shows buses available on source and destination

Route::post('/register-buses', [RegisterBusController::class, 'registerBuses']);
//registering new bus with form 