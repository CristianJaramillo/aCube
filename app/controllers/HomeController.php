<?php

use aCube\Repositories\ExtSipPhoneRepo;

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	|	Route::get('/', 'HomeController@index');
	|
	*/

	/**
	 * GET extensions
	 *
	 * @return
	 */
	public function extensions()
	{
		$extSipPhoneRepo = new ExtSipPhoneRepo();

		$extSipPhones = $extSipPhoneRepo->extensionsAndUsers();

		return Response::json($extSipPhones);
	}

}
