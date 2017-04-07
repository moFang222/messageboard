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

Route::get('/','MessageController@index'
)->name('home');
// Route::get('/',function(){
// 	return view('test');
// });
Route::post('/','MessageController@show');

Route::get('login',function(){
	return view('login');
});

Route::post('login','loginController@store');

Route::get('/logout','loginController@destroy');
// Route::post('register','loginController@create');

Route::post('message/post','MessageController@store');

Route::get('message/get','MessageController@create');

Route::get('message/show/{page}','MessageController@show')->name('message');

Route::any('captcha-test', 'loginController@verify');