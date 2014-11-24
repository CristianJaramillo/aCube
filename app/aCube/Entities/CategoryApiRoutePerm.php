<?php namespace aCube\Entities;

class CategoryApiRoutePerm extends \Eloquent {
	
	/**
	 * The database table used by the entitie.
	 *
	 * @var string
	 */
	protected $table = 'category_api_route_perms';
	
	/**
	 * The attibutes from the method create.
	 *
	 * @var array
	 */
	protected $fillable = ['category_id', 'api_route_id'];

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
     * @return
     */
    public function category()
    {
        return $this->belongsTo('aCube\Entities\Category', 'category_id', 'id');
    }

     /**
     * @return
     */
    public function apiRoute()
    {
        return $this->belongsTo('aCube\Entities\ApiRoute', 'api_route_id', 'id');
    }

}