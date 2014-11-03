<?php

namespace aCube\Repositories;

use aCube\Entities\ExtSipPhone;

/**
 * 
 */
class ExtSipPhoneRepo extends BaseRepo
{

	/**
	 * @return aCube\Entities\ExtSipPhone
	 */
	public function getEntitie()
	{
		return new ExtSipPhone();
	}

	/**
	 * @return object
	 */
	public function extensionsAndUsers()
	{
		return $this->entitie->with('user')->get();
	}

}