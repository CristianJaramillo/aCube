<?php

namespace aCube\Entities;

class CategoryPage extends \Eloquent {

	/**
	 * The database table used by the entitie.
	 *
	 * @var string
	 */
	protected $table = 'category_pages';
	
	/**
	 * The attibutes from the method create.
	 *
	 * @var array
	 */
	protected $fillable = [];

	/**
     * @param $query
     * @param $page_id
     * @param $user_id
     * @return $query
     */
    public function scopeCountPage($query, $page_id, $category_id)
    {
        return $query->where('page_id', $page_id)->where('category_id', $category_id)->count();
    }
}