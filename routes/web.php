<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('admin/medicine', 'MedicineController');

Route::resource('admin/doctor', 'DoctorController');

Route::resource('admin/pharmacy', 'PharmacyController');

Route::resource('admin/patient', 'PatientController');

Route::resource('pharmacy/store', 'PharmacystoreController');

Route::resource('doctor/prescription', 'PrescriptionController');

Route::resource('doctor/order', 'OrderController');
