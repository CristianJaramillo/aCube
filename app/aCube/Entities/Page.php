<?php namespace aCube\Entities;

class Page extends \Eloquent {

	/**
	 * The database table used by the entitie.
	 *
	 * @var string
	 */
	protected $table = 'pages';
	
	/**
	 * The attibutes from the method create.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'layout', 'lang', 'title', 'description', 'app', 'type'];

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
	 * return utf8_encode description.
	 *
	 * @var string 
	 */
	public function getDescriptionAttribute($value)
    {
        return utf8_encode($this->attributes['description']);
    }

	/**
	 * return utf8_encode title.
	 *
	 * @var string 
	 */
	public function getTitleAttribute()
    {
        return utf8_encode($this->attributes['title']);
    }

    /**
	 * The filter users not authorized
	 * 
	 * @param $query
	 * @return $query
	 */
	public function scopeCurrent($query, $name)
    {
        return $query->where('name', $name);
    }

	/**
	 * The utf8_decode description.
	 *
	 * @var string 
	 */
	public function setDescriptionAttribute($value)
    {
        if (!empty($value))
        {
            $this->attributes['description'] = utf8_decode($value);
        }
    }

	/**
	 * The utf8_decode title.
	 *
	 * @var string 
	 */
	public function setTitleAttribute($value)
    {
        if (!empty($value))
        {
            $this->attributes['title'] = utf8_decode($value);
        }
    }

    /**
     * @return
     */
    public function categoryPagePerms()
    {
    	return $this->hasMany('aCube\Entities\CategoryPagePerm', 'page_id', 'id');
    }

}