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

Route::get('/users', 'UserController@index');
Route::post('/users/register', 'UserController@create');
Route::get('/users/{id}', 'UserController@show');
Route::post('/users/update/{id}', 'UserController@update');
Route::post('/users/delete/{id}', 'UserController@destroy');
