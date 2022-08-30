<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConfirmationBookingController;
use App\Mail\ConfirmationBooking;
use App\Mail\PasswordChange;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
 return view('welcome');  
});

Route::get('/password-change/{id}',function ($id) {
    return view('myTemplate.PasswordChange')->with('data', $id);  
});

