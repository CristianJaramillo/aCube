<?php

namespace aCube\Entities;

class Category extends \Eloquent {

	/**
	 * The database table used by the entitie.
	 *
	 * @var string
	 */
	protected $table = 'categories';
	
	/**
	 * The attibutes from the method create.
	 *
	 * @var array
	 */
	protected $fillable = [];

	/**
	 * return encode to utf8 name.
	 *
	 * @var string
	 * @return string
	 */
	public function getNameAttribute($value)
    {
        return utf8_encode($this->attributes['name']);
    }

	/**
	 * The decode to utf8 name.
	 *
	 * @var string
	 * @return void
	 */
	public function setNameAttribute($value)
    {
        if (!empty($value))
        {
            $this->attributes['name'] = utf8_decode($value);
        }
    }

    /**
     * @return
     */
    public function categoryPages()
    {
    	return $this->hasMany('aCube\Entities\CategoryPage', 'category_id', 'id');
    }

}