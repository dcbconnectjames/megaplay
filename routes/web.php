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

Route::get('/tstcallbackresults', 'App\Http\Controllers\UserController@tstCallbackResults');

Route::get('/results', 'App\Http\Controllers\ResultsController@show');
Route::get('/handlewireless', 'App\Http\Controllers\UserController@handlewireless');

Route::get('/', 'App\Http\Controllers\UserController@handleLanding');

/*Route::get('/', function () {
    return view('landers.initial');
});*/

Route::get('/wireless', function () {
    return view('landers.initial_wifi');
});

Route::get('/errors', function () {
    return view('landers.errors');
});

Route::get('/declined', function () {
    return view('landers.sub_declined');
});

Route::get('/subscription-confirmed', function () {
    return view('landers.sub_confirmation');
});

Route::get('/insufficient-airtime', function () {
    return view('landers.insufficient_airtime');
});

Route::get('/unsubscribe', function () {
    return view('landers.unsubscribe');
});



Route::get('/unsub-confirmed', function () {
    return view('landers.unsubscribe_confirmation');
});

Route::get('/dounsub', 'App\Http\Controllers\UserController@dounsub');



Route::post('/registertoservice', 'App\Http\Controllers\UserController@store');

Route::get('/trafficcallback', 'App\Http\Controllers\UserController@trafficCallback');




