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

// ログイン画面へのリダイレクト
Route::get('/', function () {
    return redirect ('login');
});
// ログイン・ログアウト用のルート
Auth::routes();
// ホーム画面のルート
Route::get('/home', 'HomeController@index')->name('home');
// お気に入り用のルート
Route::get('mylist', 'Anime\MylistController@index');
Route::get('mylist/create', 'Anime\MylistController@getCreate');
Route::get('mylist/cancel', 'Anime\MylistController@getCancel');
Route::get('mylist/mylistData/{id}', 'Anime\MylistController@getMylistData');