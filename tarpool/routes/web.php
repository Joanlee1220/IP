<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//resource
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('cp_users', App\Http\Controllers\CpUserController::class);

Route::resource('ride_shares', App\Http\Controllers\RideShareController::class);

Route::resource('ride_requests', App\Http\Controllers\RideRequestController::class);

//CpUser,,
Route::get('/userlogin', [App\Http\Controllers\CpUserController::class, 'userlogin'])->name('userlogin');
Route::post('userprofile', function () {
    return view('userProfile/profile');
});

//Ride Share

Route::get('/ride_shares/myShare/{userId}', ['as' => 'ride_shares.myShare', 'uses' => 'App\Http\Controllers\RideShareController@myShare']);

Route::get('/ride_shares/who', [App\Http\Controllers\RideShareController::class, 'who'])->name('ride_shares.who');

Route::match(['put', 'accepted'], '/ride_request/{id}/accept', 'App\Http\Controllers\RideShareController@acceptedRideRide')->name('ride_request.acceptedRide');


Route::get('/ride_shares/{id}/reply', [App\Http\Controllers\RideShareController::class, 'reply'])->name('ride_shares.reply');

Route::patch('/ride_shares/{id}/replyRequest', [App\Http\Controllers\RideShareController::class, 'replyRequest'])->name('ride_shares.replyRequest');


Route::get('/rides/{id}/requests', [App\Http\Controllers\RideShareController::class, 'requestForRide'])->name('ride_shares.request_list');

Route::fallback(function(){return view('ride_share\no'); });



//Ride Request
Route::get('/ride_request/myRequest/{userId}', [App\Http\Controllers\RideRequestController::class, 'myRequest'])->name('ride_request.myRequest');

Route::delete('/ride_requests/{id}', [App\Http\Controllers\RideRequestController::class, 'destroy'])->name('ride_request.destroy');

Route::get('/ride_requests/who', 'App\Http\Controllers\RideRequestController@who')->name('ride_requests.who');

Route::get('/ride_requests/create/{id}', ['as' => 'ride_requests.create', 'uses' => 'App\Http\Controllers\RideRequestController@create']);

Route::get('/ride_shares/{id}/ride_requests/create', [App\Http\Controllers\RideRequestController::class, 'create'])->name('ride_requests.create');









