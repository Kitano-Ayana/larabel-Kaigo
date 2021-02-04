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

Auth::routes();

Route::group(['prefix' => 'patient', 'middleware' => 'auth'], function(){
    Route::get('index','PatientController@index')->name('patient.index');
    Route::get('create','PatientController@create')->name('patient.create');
    Route::post('store','PatientController@store')->name('patient.store');
    Route::get('show/{id}','PatientController@show')->name('patient.show');
    Route::get('edit/{id}','PatientController@edit')->name('patient.edit');
    Route::post('update/{id}','PatientController@update')->name('patient.update');
    Route::post('destroy/{id}','PatientController@destroy')->name('patient.destroy');
    
});

Route::group(['prefix' => 'condition', 'middleware' => 'auth'], function(){
    Route::get('create/{id}','ConditionController@create')->name('condition.create');
    Route::post('store','ConditionController@store')->name('condition.store');
    Route::get('index/{id}','ConditionController@index')->name('condition.index');
    Route::get('show/{id}','ConditionController@show')->name('condition.show');
});


Route::get('weight_log/show/{id}','WeightLogController@show')->name('weight_log.show');

Route::get('bloodpressure/show/{id}','BloodPressureController@show')->name('bloodpressure.show');




