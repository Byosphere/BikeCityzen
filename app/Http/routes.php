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
	
Route::resource('post', 'PostController');

Route::get('/blog', 'PostController@index');