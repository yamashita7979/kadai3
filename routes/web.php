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

Route::get('/regist', 'App\Http\Controllers\ItemRegistrationController@index');

Route::post('create', 'App\Http\Controllers\ItemRegistrationController@create');

Route::get('/view', 'App\Http\Controllers\BuyController@view');

Route::post('tocart', 'App\Http\Controllers\BuyController@toCart');

Route::get('clearcart', 'App\Http\Controllers\BuyController@clearCart');

Route::post('remove', 'App\Http\Controllers\BuyController@remove');

Route::get('buyitems', 'App\Http\Controllers\BuyController@buyItems');
Route::post('buyitems', 'App\Http\Controllers\BuyController@buyItems');

