<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    //
    function logout(Request $req)
{
    $req->session()->flush(); // Clears all session data
    return redirect('/login'); // Redirect to the homepage or login page
}

}
