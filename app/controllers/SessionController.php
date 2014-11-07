<?php

use aCube\Managers\AuthSessionManager;
use aCube\Repositories\UserRepo;

class SessionController extends BaseController {

	/**
	 * GET /
	 * @return \View
	 */
	public function index()
	{
		$this->setupPage();
		return parent::index();
	}

	/**
     *
     * @return \View
     * @throws aCube\Managers\ManagerValidationException
     */
    public function login()
    {
        $authSession = new AuthSessionManager(Input::all());

        if ($authSession->save())
        {
            Session::flash('message', 'login-success');
        	return Redirect::intended('/');
        } else {
            Session::flash('message', 'login-error');
        	return Redirect::route('login');
        }
    }

    /**
     * GET logout
     * @return
     */
    public function logout()
    {
        Auth::logout();
        
        Session::flash('message', 'logout-success');
        
        return Redirect::route('login');
    }

	/**
	 * GET sign-up
	 * @return \View
	 */
	public function signUp()
	{
		$this->setupPage();
		return parent::index();
	}

	/**
	 * POST register
	 *
	 * @return \View
	 * @throws aCube\Managers\ManagerValidationException
	 */
	public function register()
	{
		$userRepo = new UserRepo();

		$manager = new RegisterManager($userRepo->newUser(), Input::all());
        
        unset($userRepo);
        
        $manager->save();

        Session::flash('message', 'register-sucess');

        return Redirect::route('login');
	}

	/**
	 * GET password-reset
	 * @return \View
	 */
	public function passwordReset()
	{
		$this->setupPage();
		return parent::index();
	}

	/**
	 * POST forgot
	 * @return 
	 */
	public function forgot()
	{
		dd(Input::all());
	}

}