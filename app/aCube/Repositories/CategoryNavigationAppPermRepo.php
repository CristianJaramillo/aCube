<?php namespace aCube\Repositories;

use aCube\Entities\CategoryNavigationAppPerm;

class CategoryNavigationAppPermRepo extends BaseRepo{
	
	/**
	 * @return aCube\Entitites\CategoryNavigationAppPerm
	 */
	 public function getEntitie()
	 {
	 	return new CategoryNavigationAppPerm;
	 }

	 /**
	 * @return
	 */
	public function withNavigationApps($column, $value)
	{
		return $this->entitie->withAll($column, $value)->get();
	}

}