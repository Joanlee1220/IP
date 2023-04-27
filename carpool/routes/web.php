<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('products', App\Http\Controllers\ProductController::class);

Route::resource('accs', App\Http\Controllers\accController::class);

Route::resource('cp_users', App\Http\Controllers\CpUserController::class);
Route::resource('ride_shares', App\Http\Controllers\RideShareController::class);
Route::resource('ride_requests', App\Http\Controllers\RideRequestController::class);
Route::resource('ride_schedules', App\Http\Controllers\RideScheduleController::class);
Route::resource('ride_schedule_histories', App\Http\Controllers\RideScheduleHistoryController::class);
Route::resource('notifications', App\Http\Controllers\NotificationController::class);
Route::resource('messages', App\Http\Controllers\MessageController::class);
Route::resource('payments', App\Http\Controllers\PaymentController::class);
Route::resource('wishlists', App\Http\Controllers\WishlistController::class);
