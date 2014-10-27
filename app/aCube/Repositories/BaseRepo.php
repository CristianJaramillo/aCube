<?php 

namespace aCube\Repositories;

abstract class BaseRepo {

	/**
	 * @var object
	 */
	protected $entitie;

	
	/**
	 * @return void
	 */
	public function __construct()
    {
        $this->entitie = $this->getEntitie();
    }
    
    /**
     * @return 
     */
    abstract public function getEntitie();

    /**
     * @return
     */
    public function all()
    {
        return $this->entitie->all();
    }

    /**
     * @param
     * @param
     * @param
     * @return
     */
    public function where($key, $exp = '=', $value)
    {
        return $this->entitie->where($key, $exp, $value)->first();
    }

    /**
     * @param
     * @return
     */
    public function find($id)
    {
        return $this->entitie->find($id);
    }

}