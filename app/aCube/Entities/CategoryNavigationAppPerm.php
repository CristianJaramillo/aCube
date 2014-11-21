<?php namespace aCube\Entities;

class CategoryNavigationAppPerm extends \Eloquent {
	
	/**
	 * The database table used by the entitie.
	 *
	 * @var string
	 */
	protected $table = 'category_navigation_app_perms';
	
	/**
	 * The attibutes from the method create.
	 *
	 * @var array
	 */
	protected $fillable = ['category_id', 'navigation_app_id'];

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
    public function navigationApp()
    {
        return $this->belongsTo('aCube\Entities\NavigationApp', 'navigation_app_id', 'id');
    }	
}