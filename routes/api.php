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


Route::get('/tasks','TaskController@index');
//Route::get('/task/{id}', 'TaskController@show');
Route::post('/task','TaskController@store');
Route::put('/task/{id}','TaskController@update');
Route::delete('/task/{id}', 'TaskController@delete');

// use App\TaskModel;
// use App\Http\Resources\TaskCollection as TaskResource;

// Route::get('/task', function () {
//     return (new TaskResource(TaskModel::find(1)))
//                 ->response()
//                 ->header('X-Value', 'True');
// });

// Route::get('/test', function () {
//     return response(TaskModel::all(),200)
//             ->response()
//             ->header('X-Value', 'True');
// });


// Route::get('products', function () {
//     return response(['Product 1', 'Product 2', 'Product 3'],200);
// });
 