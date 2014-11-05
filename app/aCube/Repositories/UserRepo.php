<?php

namespace aCube\Repositories;

use aCube\Entities\User;

class UserRepo extends BaseRepo {

	/**
	 * @return aCube\Entities\User
	 */
	public function getEntitie()
	{
		return new User;
	}

	/**
	 * @return aCube\Entities\User
	 */
	public function newUser()
	{
		$user = new User();
		$user->category_id = 2;
		return $user;
	}

}