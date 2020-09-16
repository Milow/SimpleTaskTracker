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

/*Route::get('/', 'App\Http\Controllers\AuthController@home');

// Authentication
Route::get('auth/login', 'App\Http\Controllers\AuthController@getLogin');
Route::post('auth/login', 'App\Http\Controllers\AuthController@postLogin');
Route::get('auth/logout', 'App\Http\Controllers\AuthController@getLogout');

// Registration
Route::get('auth/register', 'App\Http\Controllers\AuthController@getRegister');
Route::post('auth/register', 'App\Http\Controllers\AuthController@postRegister');

// Tasks
Route::get('/tasks', 'App\Http\Controllers\TaskController@index');
Route::post('/tasks', 'App\Http\Controllers\TaskController@store');
Route::delete('/task/{task}', 'App\Http\Controllers\TaskController@destroy');*/

Route::group(['middleware' => ['web']], function() {
	Route::get('/', function () {
		return view('welcome');
	})->middleware('guest');

	Route::get('/tasks', 'App\Http\Controllers\TaskController@index');
	Route::post('/tasks', 'App\Http\Controllers\TaskController@store');
	Route::delete('/task/delete/{task}', 'App\Http\Controllers\TaskController@destroy');
	Route::get('/task/edit/{task}', 'App\Http\Controllers\TaskController@edit');
	Route::patch('/task/edit/{task}', 'App\Http\Controllers\TaskController@update');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
