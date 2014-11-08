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
	 * @return
	 */
	public function withWhere($column, $value)
	{
		return $this->entitie->withAll($column, $value)->get();
	}

	/**
	 * @param int $page_id
	 * @param int $category_id
     * @return boolean
	 */
	public function perm(int $page_id, int $category_id)
	{
		$count = $this->entitie->countPage($page_id, $category_id);

		return is_object($count) ? false : true;
	}

	/**
	 * @param int $category_id
	 * @return string $type
	 */
	public function listPagesIds($category_id, $type = 'app')
	{
		return $this->entitie->where('category_id', $category_id)->where('type', $type)->lists('page_id');
	}
}