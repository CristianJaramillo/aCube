<?php namespace aCube\Entities;

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
	protected $fillable = ['name'];

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
    public function categoryPagePerms()
    {
    	return $this->hasMany('aCube\Entities\CategoryPagePerm', 'category_id', 'id');
    }

    /**
     * @return
     */
    public function categoryResourcePerms()
    {
    	return $this->hasMany('aCube\Entities\CategoryResourcePerm', 'category_id', 'id');
    }

}