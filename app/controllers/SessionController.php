<?php

use aCube\Managers\AuthSessionManager;
use aCube\Repositories\UserRepo;

class SessionController extends BaseController {

	/**
	 * GET /login
	 *
	 * @return \View
	 */
	public function index()
	{
		$this->setupPage();
		return parent::index();
	}

	/**
     * POST /login
     *
     * @return \RedirectResponse
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
     * POST /logout 
     *
     * @return \RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        
		Session::regenerate();

        Session::flash('message', 'logout-success');

        return Redirect::route('login');
    }

	/**
	 * GET /sign-up
	 *
	 * @return \View
	 */
	public function signUp()
	{
		$this->setupPage();
		return parent::index();
	}

	/**
	 * POST /register
	 *
	 * @return \RedirectResponse
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
	 * GET /password-reset
	 *
	 * @return \View
	 */
	public function passwordReset()
	{
		$this->setupPage();
		return parent::index();
	}

	/**
	 * POST /password-reset
	 *
	 * @return \RedirectResponse
	 */
	public function forgot()
	{
		dd(Input::all());
	}

}