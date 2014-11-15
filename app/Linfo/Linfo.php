<?php namespace Linfo;

use Linfo\Get\GetInfoException;

class Linfo extends Base // implements LinfoInterface
{
	
	/**
	 * @var array
	 */
	protected $core = array();

	/**
	 * @var array
	 */
	protected $device = array();

	/**
	 * @var array
	 */
	protected $memory = array();

	/**
	 * @var array
	 */
	protected $network = array();

	/**
	 * @return void
	 */
	public function __construct()
	{
		$this->os = $this->determineOS();
		$this->settings = $this->getSettings();
		$this->setupLinfo();
	}

	/**
	 * @return void
	 */
	public function getCore()
	{
		return $this->core;
	}

	/**
	 * @return void
	 */
	public function getDevice()
	{
		return $this->device;
	}

	/**
	 * @return void
	 */
	public function getMemory()
	{
		return $this->memory;
	}

	/**
	 * @return void
	 */
	public function getNetwork()
	{
		return $this->network;
	}

	/**
	 * @return array
	 */
	public function getSettings()
	{
		return array(
				'dates' => 'm/d/y h:i A (T)'
			);
	}

	/**
	 * @return array
	 */
	public function setupCore()
	{
		$core = array(
				'icon'        => strtolower($this->os),
				'os'          => $this->OSClass->getOS(),
				'kernel'      => $this->OSClass->getKernel(),
				'accessed_ip' => isset($_SERVER['SERVER_ADDR']) ? $_SERVER['SERVER_ADDR'] : 'Unknown',
				'upTime'      => $this->OSClass->getUpTime(),
				'hostname'    => $this->OSClass->getHostName(),
				'cpus'        => $this->OSClass->getCPU(),
				'cpu_arch'    => $this->OSClass->getCPUArchitecture(),
				'load'        => $this->OSClass->getLoad(),
				'process_stats' => $this->OSClass->getProcessStats(),
				// 'service'     => $this->OSClass->getServices(),
				// 'temp'        => $this->OSClass->getTemps(),
			);
		$this->core = $core;
	}

	/**
	 * @return array
	 */
	public function setupDevice()
	{
		$this->device = $this->OSClass->getDevs();
	}

	/**
	 * @return array
	 */
	public function setupMemory()
	{
		$this->memory = $this->OSClass->getRam();
	}

	/**
	 * @return array
	 */
	public function setupNetwork()
	{
		$this->network = $this->OSClass->getNet();
	}

	/**
	 * @return void
	 */
	public function setupLinfo()
	{
		$this->OSClass = $this->loadOSClass($this->os, $this->settings);
	}

}