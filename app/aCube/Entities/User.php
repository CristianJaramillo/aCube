<?php

namespace aCube\Entities;

class User extends \Eloquent {
	
	/**
	 * The database table used by the entitie.
	 *
	 * @var string
	 */
	protected $table = 'users';
	
	/**
	 * The attibutes from the method create.
	 *
	 * @var array
	 */
	protected $fillable = ['full_name', 'username', 'password', 'email', 'authorized'];

	/**
	 * return encode to utf8 full_name.
	 *
	 * @var string 
	 */
	public function getFullNameAttribute($value)
    {
        return utf8_encode($this->attributes['full_name']);
    }

	/**
	 * The decode to utf8 full_name.
	 *
	 * @var string 
	 */
	public function setFullNameAttribute($value)
    {
        if (!empty($value))
        {
            $this->attributes['full_name'] = utf8_decode($value);
        }
    }

	/**
	 * The password encrypt.
	 *
	 * @var string 
	 */
	public function setPasswordAttribute($value)
    {
        if (!empty($value))
        {
            $this->attributes['password'] = \Hash::make($value);
        }
    }

}