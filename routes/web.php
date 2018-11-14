<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['role:employee|super-admin']], function () {
    Route::resource('rooms', 'RoomController')->middleware('auth');
    Route::resource('beds', 'BedController')->middleware('auth');
    Route::resource('appointments', 'AppointmentController')->middleware('auth');
    Route::resource('users', 'UserController')->middleware('auth');
});

Route::group(['middleware' => ['role:patient|super-admin']], function () {

});
