<?php

namespace aCube\Entities;

class RouteType extends \Eloquent {
	/**
	 * The database table used by the entitie.
	 *
	 * @var string
	 */
	protected $table = 'route_types';
	
	/**
	 * The attibutes from the method create.
	 *
	 * @var array
	 */
	protected $fillable = ['name'];
}