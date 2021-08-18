<?php

use Illuminate\Http\Request;

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

Route::get('getCountries', 'API\MainController@getCountries');
Route::get('getStates', 'API\MainController@getStates');
Route::get('username', 'API\MainController@username');
Route::get('email', 'API\MainController@email');
Route::post('pay', 'API\PaymentController@pay');


//Authenticatation Routes

Route::group(['prefix' => 'auth'], function (){ 
    Route::group(['middleware' => ['guest:api']], function () {
        Route::post('login', 'API\AuthController@login');
        Route::post('signup', 'API\AuthController@signup');
    });
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'API\AuthController@logout');
        Route::get('getuser', 'API\AuthController@getUser');

    });
});

//Group Auth Route

Route::middleware('auth:api')->group(function () {
    Route::post('updateuser', 'API\MainController@update');
    Route::post('post-schedule', 'API\MainController@postSchedule');
    Route::get('get-days', 'API\MainController@getDays');
    Route::get('doctor-schedules', 'API\MainController@getDoctorSchedule');
    Route::post('delete-schedule','API\MainController@deleteSchedule');
    Route::post('update-schedule','API\MainController@updateSchedule');
    Route::get('get-schedule','API\MainController@getSchedule');
    Route::get('search','API\MainController@searchUser');
    Route::get('all-doctors','API\MainController@allDoctors');

    //Rating
    Route::post('users/{user}/rate','API\MainController@ratingStore');
    Route::get('doctor-rating','API\MainController@getDoctorRating');


    //Contacts for messages
    Route::get('contacts','API\ContactController@getContacts');
    Route::get('conversation','API\ContactController@getConversation');
    Route::post('conversation/send','API\ContactController@postConversation');

    //Appointments
    Route::get('all-schedules','API\AppointmentController@getAppointments');

});
