<?php

namespace aCube\Entities;

class ExtSipPhone extends \Eloquent {

	/**
	 * The database table used by the entitie.
	 *
	 * @var string
	 */
	protected $table = 'ext_sip_phones';
	
	/**
	 * The attibutes from the method create.
	 *
	 * @var array
	 */
	protected $fillable = ['user_id', 'name', 'secret', 'accountcode', 'callerid'];

	/**
	 * return encode to utf8 accountcode.
	 *
	 * @var string
	 * @return string
	 */
	public function getAccountcodeAttribute($value)
    {
        return utf8_encode($this->attributes['accountcode']);
    }

	/**
	 * The decode to utf8 accountcode.
	 *
	 * @var string
	 * @return void
	 */
	public function setAccountcodeAttribute($value)
    {
        if (!empty($value))
        {
            $this->attributes['accountcode'] = utf8_decode($value);
        }
    }

    /**
	 *
	 * @return \Eloquent
	 */
	public function user()
    {
    	return $this->belongsTo('aCube\Entities\User');
    }

}