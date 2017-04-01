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


Route::group(['prefix' => '/v1'], function(){

	Route::get('/tasks', ['uses' => 'TaskController@listTasks', 'as' => 'tasks.listTasks']);

	Route::get('/tasks/{id}', ['uses' => 'TaskController@taskDetails', 'as' => 'tasks.taskDetails']);

	Route::post('/tasks', ['uses' => 'TaskController@addTask', 'as' => 'tasks.addTask']);

	Route::delete('/tasks/{id}', ['uses' => "TaskController@delete", "as" => 'tasks.delete']);

	Route::put('/tasks/{id}', ['uses' => "TaskController@update", "as" => 'tasks.update']);
});