<?php

use aCube\Managers\RegisterManager;
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

	/**
	 * POST forgot
	 *
     * @return 
	 */
	public function forgot()
	{
		dd(Input::all());
	}

	/**
	 * POST register
	 *
	 * @return \View
	 * @throws aCube\Managers\ManagerValidationException
	 */
	public function register()
	{
		$userRepo = new aCube\Repositories\UserRepo;

		$manager = new RegisterManager($userRepo->newUser(), Input::all());
        
        $manager->save();

        Session::flash('message', 'register-sucess');

        return Redirect::route('sign-in');
	}

}
