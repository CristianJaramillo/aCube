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
	 * The attributes defining guarded
	 *
	 * @var array
	 */	
	protected $guarded = [];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['created_at', 'updated_at'];

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
    public function categoryApiRoutePerms()
    {
    	return $this->hasMany('aCube\Entities\CategoryApiRoutePerm', 'category_id', 'id');
    }

    /**
     * @return
     */
    public function categoryNavigationAppPerms()
    {
    	return $this->hasMany('aCube\Entities\CategoryNavigationAppPerm', 'category_id', 'id');
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
    public function users()
    {
    	return $this->hasMany('aCube\Entities\User', 'category_id', 'id');
    }

}