<?php

namespace aCube\Responses;

use aCube\Repositories\ExtSipPhoneRepo;

class ExtSipPhoneResponse {

	/**
	 * @var $data
	 */
	protected $data;

	/**
	 * @var $headers
	 */
	protected $headers;

	/**
	 * @var $repository
	 */
	protected $repository;

	/**
	 * @var $response
	 */
	protected $response;

	/**
	 * @var $rules
	 */
	protected $rules;

	/**
	 * @return void 
	 */
	public function __construct(array $data)
	{
		$this->rules = $this->getRules(); 
		$this->data  = array_only($data, array_keys($this->rules));
		$this->repository = $this->getRepository();
	}	

	/**
	 * @return array
	 */
	public function getHeaders()
	{
		return array();
	}

	/**
	 * @return
	 */
	public function getRepository()
	{
		return new ExtSipPhoneRepo();
	}

	/**
	 * @return array
	 */
	public function getRules()
	{
		return array(
				'_search' => '',
				'id' => 'required_',
				'oper'    => 'in:edit,del,add',
				'page'    => '',
				'rows'    => '',
				'sidx'    => '',
				'sord'    => '',
			);
	}

}