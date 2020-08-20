<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('users', 'MobileRequests@all_users');
Route::get('users_info', 'MobileRequests@all_users_info');
Route::get('auth', 'MobileRequests@auth');
Route::get('getUser', 'MobileRequests@userinfo');
Route::get('updateUser', 'MobileRequests@update_user');
Route::get('all-appointments', 'MobileRequests@all_appointments');
Route::get('update-appointment', 'MobileRequests@update_appointment');
Route::get('cancel-appointment', 'MobileRequests@cancel_appointment');
Route::get('table', 'MobileRequests@full_table');
Route::get('update-booking', 'MobileRequests@update_booking');
Route::get('new-client', 'MobileRequests@newClient');
Route::get('usernames', 'MobileRequests@allUserNames');
Route::get('book-appointment', 'MobileRequests@book_appointment');
Route::get('change-password', 'MobileRequests@change_password');
