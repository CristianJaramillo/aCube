<?php

use aCube\Managers\RegisterManager;
use aCube\Repositories\PageRepo;

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	|	Route::get('/', 'HomeController@index');
	|
	*/

	public function ajax($app = 'blank_')
	{
		$page = new PageRepo();
		$page = $page->current($app, 'private');

		// dd($page);

		if(!is_object($page))
		{
			unset($page);
			throw new Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
		}

		$this->addParam(['sub_title' => $page->title]);

		return View::make('apps.dashboard.blank_', $this->params);
	}

	public function forgot()
	{
		dd(Input::all());
	}

	public function signIn()
	{
		dd(Input::all());
	}

	public function register()
	{
		$manager = new RegisterManager(new \aCube\Entities\User, Input::all());
        
        $manager->save();

        Session::flash('message', 'register-sucess');

        return Redirect::route('sign-in');
	}

}
