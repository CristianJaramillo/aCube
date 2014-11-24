<?php namespace aCube\Entities;

class UserDashboardConfig extends \Eloquent {
	
	/**
	 * The database table used by the entitie.
	 *
	 * @var string
	 */
	protected $table = 'user_dashboard_configs';
	
	/**
	 * The attibutes from the method create.
	 *
	 * @var array
	 */
	protected $fillable = ['breadcrumbs', 'no_main_header', 'page_body_prop', 'page_html_prop'];

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
    public function user()
    {
    	return $this->hasOne('aCube\Entities\User', 'id', 'id');
    }

}