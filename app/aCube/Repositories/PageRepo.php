<?php

namespace aCube\Repositories;

use aCube\Entities\Page;

class PageRepo extends BaseRepo
{
	
	/**
	 * The filter page not authorized
	 * 
	 * @return Eloquent
	 */
	public function current()
    {
        return $this->entitie->current()->first();
    }

	/**
	 * @return aCube\Entities\Page
	 */
	public function getEntitie()
	{
		return new Page;
	}

}