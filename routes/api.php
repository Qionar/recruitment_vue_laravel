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


Route::get('/customers', 'CustomersController@index');

Route::get('/customers/details/{id}', 'CustomersController@show');

Route::post('/customers/create', 'CustomersController@create');

Route::post('/customers/update/{id}', 'CustomersController@update');

Route::delete('/customers/delete/{id}', 'CustomersController@delete');
