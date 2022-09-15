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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// 各画面の表示
Route::get('/typingSite', 'App\Http\Controllers\HomeController@index');
Route::get('/typingSite/mst/delete', 'App\Http\Controllers\MstDeleteTopicController@delete');
Route::get('/typingSite/mst/edit', 'App\Http\Controllers\MstEditTopicController@edit');
Route::get('/typingSite/mst/register', 'App\Http\Controllers\MstRegisterTopicController@register');
Route::get('/typingSite/mst/list', 'App\Http\Controllers\MstTopicListController@list');
Route::get('/typngSite/play', 'App\Http\Controllers\PlayController@play');
Route::get('/typingSite/result', 'App\Http\Controllers\ResultController@result');
Route::get('/typingSite/login', 'App\Http\Controllers\LoginController@login');
Route::get('/typingSite/userRegist', 'App\Http\Controllers\UserRegistController@userRegist');


// センテンス登録
Route::get('/create', 'App\Http\Controllers\MstRegisterTopicController@create');
Route::post('/create', 'App\Http\Controllers\MstRegisterTopicController@create');

// 管理画面機能
Route::get('remove', 'App\Http\Controllers\MstDeleteTopicController@remove');
Route::post('remove', 'App\Http\Controllers\MstDeleteTopicController@remove');

// ユーザー登録
Route::get('/userCreate', 'App\Http\Controllers\UserRegistController@create');
Route::post('/userCreate', 'App\Http\Controllers\UserRegistController@create');

// ログアウト
Route::get('/typingSite/logout', 'App\Http\Controllers\HomeController@logout');
