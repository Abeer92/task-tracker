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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/{name}',"WeclomeController@index");

Route::group(['middleware'=>'auth'], function(){
	
	Route::get('/view',"taskController@view");

	Route::get('/new',"taskController@addTask");

	Route::post('/posttask', "taskController@postNewTask");

	Route::get('/delete/{id}', 'taskController@deleteTask');

	Route::get('/edit/{id}', 'taskController@editTask');

	Route::post('/update', 'taskController@updateTask');
});


Auth::routes();

Route::get('/home', 'HomeController@index');
