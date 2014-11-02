<?php

namespace aCube\Managers;

class AuthManager extends BaseManager
{

	/**
	 * @var boolean $remember
	 */
	protected $remember = false;

	/**
     * @param array $data
     * @return void
     */
    public function __construct(array $data)
    {
        $this->rules  = $this->getRules();
        $this->data   = array_only($data, array_keys($this->rules));
    }

	/**
	 * @param array $credentials
	 * @return boolean
	 */
	public function auth($credentials)
	{
		return \Auth::attempt($credentials, $this->remember);
	}

	/**
	 * @return array
	 */
	public function getRules()
	{
		return [
			'email'      => 'email|required|exists:users,email',
			'password'   => 'min:6|max:25|required',
			'remember'   => ''
		];
	}

	/**
     * @var array $data
     * @return array $data
     */
    public function prepareData(array $data)
    {

    	if (isset($data['remember'])) {
    		$this->remember = true;
    		unset($data['remember']);
    	}

        return $data;
    }

	/**
	 * @return boolean
	 */
	public function save()
	{
		$this->isValid();

		return $this->auth($this->prepareData($this->data));
	}
}