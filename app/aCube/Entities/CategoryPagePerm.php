<?php

namespace aCube\Entities;

class CategoryPagePerm extends \Eloquent {

	/**
	 * The database table used by the entitie.
	 *
	 * @var string
	 */
	protected $table = 'category_page_perms';
	
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

    /**
     * @return
     */
    public function scopeWithAll($query, $column, $value)
    {
        return $query->where($column, $value)->with('category', 'page');
    }

    /**
     * @return
     */
    public function category()
    {
        return $this->belongsTo('aCube\Entities\Category', 'category_id', 'id');
    }

    /**
     * @return
     */
    public function page()
    {
        return $this->belongsTo('aCube\Entities\Page', 'page_id', 'id');
    }

}