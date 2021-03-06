<?php

use Illuminate\Http\Request;

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


Route::get('users', 'UserController@getUsers');
Route::get('users/{id}', 'UserController@getUserbyID');

Route::get('messages/{fromUserID}/{toUserID}', 'MessageController@getMessages');
Route::post('messages', 'MessageController@sendMessage');
Route::delete('messages/{id}', 'MessageController@deleteMessage');