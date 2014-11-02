<?php

use aCube\Managers\AuthManager;

class AuthController extends BaseController {

    /**
     *
     * @return
     */
    public function login()
    {
        $manager = new AuthManager(Input::all());

        if (!$manager->save())
        {
            Session::flash('message', 'login-error');
            return Redirect::to('/');
        } else {
            Session::flash('message', 'login-success');
            return Redirect::to('dashboard');
        }
    }

    /**
     *
     * @return
     */
    public function logout()
    {
        Auth::logout();
        
        Session::flash('message', 'logout-success');
        
        return Redirect::to('/');
    }

} 