<?php 

namespace aCube\Responses;

use aCube\Linfo\Linfo;

/**
 * 
 */
class LinfoResponse {
	
	/**
	 * @var array
	 */
	protected $data;

	/**
	 * @var array
	 */
	protected $response;

	/**
	 * @return void
	 */
	public function __construct(Linfo $linfo)
	{
		
	}

	/**
	 * @return void
	 */
	public function __get($attr)
	{
		if (isset($this->{$attr})) {
            return $this->{$attr};
        }
        return $attr;
	}
}