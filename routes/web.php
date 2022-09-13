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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/calculator', 'App\Http\Controllers\CalculatorController@index');

Route::get('/calculate', 'App\Http\Controllers\CalculatorController@calculate');
Route::post('/calculate', 'App\Http\Controllers\CalculatorController@calculate');
