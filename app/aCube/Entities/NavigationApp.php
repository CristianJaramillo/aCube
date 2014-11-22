<?php namespace aCube\Entities;

class NavigationApp extends \Eloquent {
	/**
	 * The database table used by the entitie.
	 *
	 * @var string
	 */
	protected $table = 'navigation_apps';
	
	/**
	 * The attibutes from the method create.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'title', 'url', 'url_target', 'icon', 'label_htm', 'parent'];

	/**
     * @return
     */
    public function categoryNavigationAppPerms()
    {
    	return $this->hasMany('aCube\Entities\CategoryNavigationAppPerm', 'navigation_app_id', 'id');
    }
}