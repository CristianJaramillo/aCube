<?php

use aCube\Managers\AuthManager;

class AuthController extends BaseController {

    public function login()
    {
        $manager = new AuthManager(Input::all());

        if (!$manager->save())
        {
            Session::flash('message', 'login-error');
        }
        
        Session::flash('message', 'login-success');
        
        return Redirect::route('dashboard');
    }

    public function logout()
    {
        Auth::logout();
        
        Session::flash('message', 'logout-success');
        
        return Redirect::route('login');
    }

} 