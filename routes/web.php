<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\RegisterBusController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\AdminController;




///////////////////////////////////////////////////////////////////////
//                       VIEW PAGES FOR FRONT-END
////////////////////////////////////////////////////////////////////////
Route::view('/','home');
Route::view('/register','register');
// Route::view('/login','login');




///////////////////////////////////////////////////////////////////////
//                       ADMIN PAGE +LINKS
////////////////////////////////////////////////////////////////////////
Route::get('/admin',[AdminController::class,'alluser']);
Route::get('/admin-all-users-show',[AdminController::class,'alluserShow']);
// Route to show the user edit form
Route::get('/users/edit/{id}', [AdminController::class, 'edit'])->name('users.edit');
// Route to handle the update form submission
Route::post('/users/update/{id}', [AdminController::class, 'update'])->name('users.update');
// Route to delete a user
Route::delete('/users/delete/{id}', [AdminController::class, 'destroy'])->name('users.destroy');
// Route to block the user
Route::get('/users/block/{id}', [AdminController::class, 'block'])->name('users.block');
Route::get('/users/unblock/{id}', [AdminController::class, 'unblock'])->name('users.unblock');





Route::view('/booking','booking');
Route::view('/search','search');
Route::view('/cart','cart-pay');
Route::get('/seat',[SeatController::class,'seatCreate']);







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
Route::post('/user-login', [LoginController::class,'login_check']);//Login logic
Route::get('/login',[LoginController::class,'login']);//to check if user already logged in return to home page
Route::get('/logout',[LogoutController::class,'logout']);



///////////////////////////////////////////////////////////////////////
//                       BUS DETAILS API(SEARCH AND ADD BUS)
////////////////////////////////////////////////////////////////////////
Route::get('/buses', [BusController::class, 'getBuses']);
//shows buses available on source and destination

Route::get('/add_buses',[BusController::class,'add_buses']);//ADMIN CAN ADD NEW BUSES

Route::post('/register-buses', [RegisterBusController::class, 'registerBuses']);
//registering new bus with form 







Route::post('/book-seats', [BookingController::class, 'bookSeats'])->name('book.seats');




///////////////////////////////////////////////////////////////////////
//                       TICKET NO GENERATION AND SEAT BOOKING CONFIRMATION
////////////////////////////////////////////////////////////////////////

Route::get('confirm-tickets',[TicketController::class,'ticket_book']);
Route::get('ticket-payment',[TicketController::class,'payment']);




///////////////////////////////////////////////////////////////////////
//                       TICKET DETAILS SHOWING
////////////////////////////////////////////////////////////////////////
Route::get('my-tickets',[ShowController::class,('showTicketDetails')]);






///////////////////////////////////////////////////////////////////////
//                       
//                           ADMIN LINKS ONLY
//                       
////////////////////////////////////////////////////////////////////////
Route::get('all-tickets',[AdminController::class,'showTickets']);