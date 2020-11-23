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
// アニメ検索用
Route::get( 'search', 'Anime\SearchController@index' ); // 一覧表示用
// お気に入り用のルート
Route::get('mylist', 'Anime\MylistController@index'); // 一覧表示用
Route::get('mylist/create', 'Anime\MylistController@getCreate'); // お気に入り登録用
Route::get('mylist/cancel', 'Anime\MylistController@getCancel');  // お気に入りキャンセル用
Route::get('mylist/edit/{id}', 'Anime\MylistController@getEdit'); // お気に入り編集用
Route::post('mylist/edit/{id}', 'Anime\MylistController@postEdit'); // お気に入り編集用
Route::get('mylist/mylistData/{id}', 'Anime\MylistController@getMylistData'); // 詳細表示用

// アカウント
Route::get('account', 'Account\AccountController@index'); // 一覧表示用
Route::get('account/create', 'Account\AccountController@getCreate'); // アカウント登録用
Route::post('account/create', 'Account\AccountController@postCreate'); // アカウント登録用
Route::get('account/detail/{id}', 'Account\AccountController@getDetail'); // アカウント編集用
Route::post('account/detail/{id}', 'Account\AccountController@postDetail'); // アカウント編集用
Route::get('account/edit/{id}', 'Account\AccountController@getEdit'); // アカウント編集用
Route::post('account/edit/{id}', 'Account\AccountController@postEdit'); // アカウント編集用
Route::get('account/delete/{id}', 'Account\AccountController@getDelete'); // アカウント編集用
Route::post('account/delete/{id}', 'Account\AccountController@postDelete'); // アカウント編集用
