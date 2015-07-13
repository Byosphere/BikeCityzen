<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');
Route::get('/home', function(){

	return redirect('/');
});

Route::get('/location', 'LocationController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['namespace' => 'admin', 'prefix' => 'admin'], function(){

	Route::get('dashboard', 'BoardController@index');
});

Route::get('post/{id}/destroy', 'PostController@destroy');
Route::get('velo/{id}/destroy', 'VeloController@destroy');
Route::resource('post', 'PostController');
Route::resource('velo', 'VeloController');

Route::get('/blog', 'PostController@index');
