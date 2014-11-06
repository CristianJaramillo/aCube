<?php

namespace aCube\Repositories;

use aCube\Entities\CategoryPage;

class CategoryPageRepo extends BaseRepo {

	/**
	 * @return aCube○\Entities\CategoryPerm
	 */
	public function getEntitie()
	{
		return new CategoryPage;
	}

	/**
	 * @param
	 * @param
     * @return
	 */
	public function perm($page_id, $category_id)
	{
		$count = $this->entitie->countPage($page_id, $category_id);

		return is_object($count) ? 0 : $count;
	}

}