<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//School routes
Route::get('schools', 'SchoolController@index');
Route::post('school', 'SchoolController@store');
Route::get('school/{id}', 'SchoolController@show');
Route::post('school/{id}', 'SchoolController@update');
Route::delete('school/{id}', 'SchoolController@destroy');

//Progenitor routes
Route::get('progenitors', 'ProgenitorController@index');
Route::post('progenitor', 'ProgenitorController@store');
Route::get('progenitor/{id}', 'ProgenitorController@show');
Route::post('progenitor/{id}', 'ProgenitorController@update');
Route::delete('progenitor/{id}', 'ProgenitorController@destroy');

//User routes
Route::get('users', 'UserController@index');
Route::post('user', 'UserController@store');
Route::get('user/{id}', 'UserController@show');
Route::post('user/{id}', 'UserController@update');
Route::delete('user/{id}', 'UserController@destroy');

//Service routes
Route::get('services', 'ServiceController@index');
Route::post('service', 'ServiceController@store');
Route::get('service/{id}', 'ServiceController@show');
Route::post('service/{id}', 'ServiceController@update');
Route::delete('service/{id}', 'ServiceController@destroy');

//Payment routes
Route::get('payments', 'PaymentController@index');
Route::post('payment', 'PaymentController@store');
Route::get('payment/{id}', 'PaymentController@show');
Route::post('payment/{id}', 'PaymentController@update');
Route::delete('payment/{id}', 'PaymentController@destroy');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
