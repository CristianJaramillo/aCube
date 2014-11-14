<?php namespace Linfo;

use Linfo\Get\GetInfoException;

class Linfo extends Base // implements LinfoInterface
{
	
	/**
	 * @var array
	 */
	protected $core = array();

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
	 * @return void
	 */
	public function setupLinfo()
	{
		$this->OSClass = $this->loadOSClass($this->os, $this->settings);
	}

}