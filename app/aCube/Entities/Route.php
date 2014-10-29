<?php

namespace aCube\Entities;

class Route extends \Eloquent {
	/**
	 * The database table used by the entitie.
	 *
	 * @var string
	 */
	protected $table = 'routes';
	
	/**
	 * The attibutes from the method create.
	 *
	 * @var array
	 */
	protected $fillable = [];
}