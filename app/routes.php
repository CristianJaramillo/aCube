<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

Route::get('/', ['as' => 'login', 'uses' => 'LoginController@index']);

Route::post('/', function () {
	return Redirect::to('dashboard');
});

Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'LoginController@index']);

/**
 * Esta página no esta registrada en la base de datos.
 */
Route::get('example', ['uses', 'LoginController@index']);