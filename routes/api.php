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


Route::GET('/tasks','TaskController@index');
Route::GET('/tasks/{id}','TaskController@show');
Route::POST('/tasks','TaskController@store');
Route::PUT('/tasks/{id}','TaskController@update');
Route::DELETE('/tasks/{id}', 'TaskController@delete');
