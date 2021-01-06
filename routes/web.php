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

use function Ramsey\Uuid\v1;

Route::get('/', function () {
    return view('welcome');
});

Route::get('patient/index','PatientController@index')->name('patient.index');
Route::get('patient/create','PatientController@create')->name('patient.create');
Route::post('patient/store','PatientController@store')->name('patient.store');
Route::get('patient/show/{id}','PatientController@show')->name('patient.show');
Route::get('patient/edit/{id}','PatientController@edit')->name('patient.edit');
Route::post('patient/update/{id}','PatientController@update')->name('patient.update');
Route::post('patient/destroy/{id}','PatientController@destroy')->name('patient.destroy');

Route::get('condition/create/{id}','ConditionController@create')->name('condition.create');
Route::post('condition/store','ConditionController@store')->name('condition.store');
Route::get('condition/show/{id}','ConditionController@show')->name('condition.show');


Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

