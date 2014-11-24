<?php

use aCube\Repositories\UserRepo;

class UserController extends \BaseController {

	/**
	 * @var aCube\Repositories\UserRepo
	 */
	protected $userRepo;

	/**
	 * @param UserRepo $userRepo
	 * @return void
	 */
	public function __construct(UserRepo $userRepo)
	{
		$this->userRepo = $userRepo;
	}

	/**
	 * POST /user/json/{method}
	 *
	 * @return Response
	 */
	public function json($method)
	{
		return ["data" => call_user_func_array([$this->userRepo, $method], \Input::all())];
	}

}