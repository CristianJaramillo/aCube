<?php

namespace aCube\Entities;

class ExtSipPerm extends \Eloquent {
	/**
	 * The database table used by the entitie.
	 *
	 * @var string
	 */
	protected $table = 'ext_sip_perms';
	
	/**
	 * The attibutes from the method create.
	 *
	 * @var array
	 */
	protected $fillable = ['ext_sip_phone_id', 'perm', 'password'];
}