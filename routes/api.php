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
Route::middleware('auth:api')->resource('/costumers', 'CostumerController');
Route::middleware('auth:api')->resource('/services', 'ServiceController');
Route::middleware('auth:api')->resource('/users', 'UserController');
Route::middleware('auth:api')->post('/schedules', 'ScheduleBarberController@index');
Route::middleware('auth:api')->post('/schedules/store', 'ScheduleBarberController@store');
Route::middleware('auth:api')->get('/schedules/{schedule}','ScheduleBarberController@show');
Route::middleware('auth:api')->get('/me','LoginController@me');


Route::post('/login', 'LoginController@login');
