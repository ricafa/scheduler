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

Route::resource('patients','PatientController')->middleware('auth');
Route::resource('doctors','DoctorController')->middleware('auth');
Route::resource('schedules','ScheduleController')->middleware('auth');

Route::get('/listDoctors', function () {
	return response()->json(\App\Doctor::all());
});