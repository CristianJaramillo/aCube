<?php namespace aCube\Entities;

class ApiRoute extends \Eloquent {
	
	/**
	 * The database table used by the entitie.
	 *
	 * @var string
	 */
	protected $table = 'api_routes';
	
	/**
	 * The attibutes from the method create.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'uri', 'url', 'method'];

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
    public function categoryApiRoutePerms()
    {
    	return $this->hasMany('aCube\Entities\CategoryApiRoutePerm', 'api_route_id', 'id');
    }

}