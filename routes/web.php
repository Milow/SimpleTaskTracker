<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['web']], function() {
	Route::get('/', function () {
		return view('welcome');
	})->middleware('guest');

	Route::get('/tasks', 'App\Http\Controllers\TaskController@index');
	Route::post('/tasks', 'App\Http\Controllers\TaskController@store');
	Route::delete('/task/delete/{task}', 'App\Http\Controllers\TaskController@destroy');
	Route::get('/task/edit/{task}', 'App\Http\Controllers\TaskController@edit');
	Route::patch('/task/edit/{task}', 'App\Http\Controllers\TaskController@update');
	Route::put('/task/status/{task}', 'App\Http\Controllers\TaskController@updateStatus');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
