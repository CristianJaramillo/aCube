<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

// Debugbar::disable();

Route::get('/', ['as' => 'login', 'uses' => 'HomeController@index']);
Route::post('/', ['as' => 'sign-in', 'uses' => 'HomeController@signIn']);

Route::get('sign-up', ['as' => 'sign-up', 'uses' => 'HomeController@index']);
Route::post('register', ['as' => 'register', 'uses' => 'HomeController@register']);

Route::get('forgotpassword', ['as' => 'forgotpassword', 'uses' => 'HomeController@index']);
Route::post('forgot', ['as' => 'forgot', 'uses' => 'HomeController@forgot']);

Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'HomeController@index']);

Route::get('dashboard/users', ['as' => 'users', 'uses' => 'HomeController@index']);
Route::get('dashboard/extensions', ['as' => 'extensions', 'uses' => 'HomeController@index']);

Route::get('ajax/{app}', ['uses' => 'HomeController@ajax']);
