<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	|	Route::get('/', 'HomeController@index');
	|
	*/

	public function forgot()
	{
		dd(Input::all());
	}

	public function signIn()
	{
		dd(input::all());
	}

	public function register()
	{
		dd(input::all());
	}

}
