<?php

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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/msngr', 'MsngrController@index')->name('msngr');
Route::get('/search', 'MsngrController@searchusersbyname');
Route::get('/group-messages', 'MsngrController@getmessagesforgroup');

Route::resource('groups', 'GroupController');
Route::resource('conversations', 'ConversationController');
