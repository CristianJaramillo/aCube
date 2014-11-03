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

		$json = array();

		foreach ($extSipPhones as $extension) {
			$json[] = array(
					'id'        => $extension->id,
					'extension'      => $extension->name,
					'full_name' => $extension->user->full_name,
					'email'     => $extension->user->email
				);
		}

		return Response::json($json);
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
		$manager = new RegisterManager(new aCube\Entities\User, Input::all());
        
        $manager->save();

        Session::flash('message', 'register-sucess');

        return Redirect::route('sign-in');
	}

}
