<?php namespace Linfo;

use Linfo\Get\GetInfoException;
use Linfo\Linfo\LinfoError;

/*
 |---------------------------------------------------
 |
 |---------------------------------------------------
 */

abstract class Base {

	/**
	 * @var string
	 */
	protected $os;

	/**
	 * @var object
	 */
	protected $OSClass;

	/**
	 * @var array
	 */
	protected $settings = array();

    /**
	 * Determine the OS
	 * @return string|false if the OS is found, returns the name; Otherwise false
	 */
	public function determineOS() {

		list($os) = explode('_', PHP_OS, 2);

		// This magical constant knows all
		switch ($os)
		{

			// These are supported
			case 'Linux':
			case 'FreeBSD':
			case 'DragonFly':
			case 'OpenBSD':
			case 'NetBSD':
			case 'Minix':
			case 'Darwin':
			case 'SunOS':
				return PHP_OS;
			break;
			case 'WINNT':
			case 'Windows':
				return 'Windows';
			break;
			case 'CYGWIN':
				return 'CYGWIN';
			break;

			// So anything else isn't
			default:
				return false;	
			break;
		}
	}

	/**
	 * @return array
	 */
	abstract public function getSettings();

	/**
	 * Start up class based on result of determineOS
	 *
	 * @param string $type the name of the operating system
	 * @param array $settings linfo settings
	 * @return array the system information
	 * @throws Linfo\Get\GetInfoException
	 */
	public function loadOSClass($os, $settings, $namespace = 'Linfo\OS\OS_') {
		$class = $namespace.$os;

		if(!class_exists($class)) throw new GetInfoException('OS not found!');

		return new $class($settings);		
	}

}