<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

Route::get('/', ['as' => 'login', 'uses' => 'LoginController@index']);

Route::get('404', ['as' => '404', 'uses' => 'LoginController@index']);

Route::get('500', ['as' => '500', 'uses' => 'LoginController@index']);

Route::post('/', function () {
	dd(Input::all());
});