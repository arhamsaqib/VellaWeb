<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.signin');
});

Route::get('/signin', 'SignInController@index');
Route::get('/signup', 'SignInController@signup');
Route::post('/signup', [
    'uses' => 'SignInController@postSignUp',
    'as' => 'signup'
]);
Route::post('/createnew', [
    'uses' => 'SignInController@createNewUser',
    'as' => 'createnew'
]);
Route::post('/updateinfo', [
    'uses' => 'SignInController@updateinfo',
    'as' => 'updateinfo'
]);
Route::post('/signin', [
    'uses' => 'SignInController@postSignIn',
    'as' => 'signin'
]);
Route::post('/edit_user', [
    'uses' => 'AdminHome@edituser',
    'as' => 'edituser'
]);
Route::post('/delete_user', [
    'uses' => 'AdminHome@deleteuser',
    'as' => 'deleteuser'
]);
Route::post('/settings/bookings', [
    'uses' => 'AdminHome@bookingsettings',
    'as' => 'bookingsettings'
]);
Route::post('/booknow/save', [
    'uses' => 'AdminHome@bookappointment',
    'as' => 'bookappointment'
]);
Route::post('/show-appointment', [
    'uses' => 'AdminHome@showappointment',
    'as' => 'show-appointment'
]);
Route::post('/show-appointment-user', [
    'uses' => 'UserHomeController@showappointment',
    'as' => 'show-appointment-user'
]);
Route::post('/edit-appointment', [
    'uses' => 'AdminHome@editappointment',
    'as' => 'edit-appointment'
]);
Route::post('/update-appointment', [
    'uses' => 'AdminHome@updateappointment',
    'as' => 'update-appointment'
]);
Route::post('/booknow-client/save', [
    'uses' => 'UserHomeController@bookappointment',
    'as' => 'savebooking-client'
]);

Route::post('/edit-appointment-client', [
    'uses' => 'UserHomeController@editappointment',
    'as' => 'edit-appointment-client'
]);
Route::post('/update-appointment-client', [
    'uses' => 'UserHomeController@updateappointment',
    'as' => 'update-appointment-client'
]);

Route::get('/forget-password', 'SignInController@forget');
Route::get('/home-admin', 'AdminHome@index');
Route::get('/clients', 'AdminHome@clients');
Route::get('/home-user', 'UserHomeController@index');
Route::get('/user/create', 'AdminHome@newuser');
Route::get('/booknow', 'AdminHome@booknow');
Route::get('/booknow-client', 'UserHomeController@bookappointment');
Route::get('/settings', 'AdminHome@settings');
Route::get('/calender', 'AdminHome@calender');
Route::get('/calender-user', 'UserHomeController@calender');
Route::get('/settings/profile', 'AdminHome@profile');
Route::get('/settings/email', 'AdminHome@email');
Route::get('/settings/booking', 'AdminHome@bookings');
Route::get('/appointments', 'AdminHome@allappointments');
Route::get('/appointments-user', 'UserHomeController@allappointments');
Route::get('/settings/profile-user', 'UserHomeController@profile');
