<?php

use aCube\Managers\RegisterManager;

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
	 * POST forgot
	 *
     * return 
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
		$manager = new RegisterManager(new aCube\Entities\User, Input::all());
        
        $manager->save();

        Session::flash('message', 'register-sucess');

        return Redirect::route('sign-in');
	}

}
