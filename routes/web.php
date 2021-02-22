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

Route::get('/', function () {return view('index');});




//-------ユーザー------------------------------------------------------     
Route::namespace('User')->prefix('user')->name('user.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => false,
        'verify'   => false
    ]);

    // ログイン認証後
         Route::middleware('auth:user')->group(function () {

        // TOPページ
        Route::resource('home', 'HomeController', ['only' => 'index']);

        //患者登録
        Route::group(['prefix' => 'patient'], function(){
            Route::get('index','PatientController@index')->name('patient.index');
            Route::get('create','PatientController@create')->name('patient.create');
            Route::post('store','PatientController@store')->name('patient.store');
            Route::get('show/{id}','PatientController@show')->name('patient.show');
            Route::get('edit/{id}','PatientController@edit')->name('patient.edit');
            Route::post('update/{id}','PatientController@update')->name('patient.update');
            Route::post('destroy/{id}','PatientController@destroy')->name('patient.destroy');
            
        });

        //状態記録
        Route::group(['prefix' => 'condition'], function(){
            Route::get('create/{id}','ConditionController@create')->name('condition.create');
            Route::post('store','ConditionController@store')->name('condition.store');
            Route::get('index/{id}','ConditionController@index')->name('condition.index');
            Route::get('show/{id}','ConditionController@show')->name('condition.show');
        });
        
        //体重記録
        Route::get('weightlog/show/{id}','WeightLogController@show')->name('weightlog.show');

        //血圧記録
        Route::get('bloodpressure/show/{id}','BloodPressureController@show')->name('bloodpressure.show');


    });
});
//----------------------------------------------------------------------------------------------------


//-----------管理者------------------------------------------------------------------------------------
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => false,
        'verify'   => false
    ]);

    // ログイン認証後
    Route::middleware('auth:admin')->group(function () {

        // TOPページ
        Route::resource('home', 'HomeController', ['only' => 'index']);
        Route::get('user', 'AdminController@user')->name('user');
        Route::get('patient/index/{id}', 'AdminController@patientIndex')->name('patient.index');
        Route::get('patient/show/{id}', 'AdminController@patientShow')->name('patient.show');
        Route::get('condition/index/{id}', 'AdminController@conditionIndex')->name('condition.index');
        Route::get('condition/show/{id}', 'AdminController@conditionShow')->name('condition.show');
        Route::get('weightlog/show/{id}', 'AdminController@weightlogShow')->name('weightlog.show');
        Route::get('bloodpressure/show/{id}', 'AdminController@bloodpressureShow')->name('bloodpressure.show');



    });

});
//-------------------------------------------------------------------------------------------------------

    







