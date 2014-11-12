<?php

namespace aCube\Linfo;

abstract class Base {

	/**
	 * @var array
	 */
	protected $info;

	/**
	 * @var array
	 */
	protected $lang;

	/**
	 * @var object aCube\Linfo\*
	 */
	protected $os;

	/**
	 * @var array
	 */
	protected $settings;

	/**
     * @return array|object
     */
    abstract public function getSettings();

    /**
	 * Determine the OS
	 * @return string|false if the OS is found, returns the name; Otherwise false
	 */
	public function determineOS() {

		list($os) = explode('_', PHP_OS, 2);

		// This magical constant knows all
		switch ($os) {

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
	 * Start up class based on result of determineOS
	 * @param string $type the name of the operating system
	 * @param array $settings linfo settings
	 * @return array the system information
	 * @throws \Exception
	 */
	public function loadSystemOsClass($type, $settings, $namespace = 'aCube\Linfo\OS\OS_') {
		$class = $namespace.$type;

		if(class_exists($class)) return new $class($settings);

		throw new GetInfoException();
	}

	/**
	 * Deal with extra extensions
	 * @param array $info the system information
	 * @param array $settings linfo settings
	 */
	public function runExtensions(&$info, $settings) {

		// Info array is passed by reference so we can edit it directly
		$info['extensions'] = array();
		
		// Are there any extensions configured?
		if(!array_key_exists('extensions', $settings) || count($settings['extensions']) == 0) 
			return;

		// Go through each enabled extension
		foreach((array)$settings['extensions'] as $ext => $enabled) {

			// Is it really enabled?
			if (empty($enabled)) 
				continue;

			// Does the file exist? load it then
			if (file_exists(LOCAL_PATH . 'lib/class.ext.'.$ext.'.php'))
				require_once LOCAL_PATH . 'lib/class.ext.'.$ext.'.php';
			else {
				
				// Issue an error and skip this thing otheriwse
				LinfoError::Fledging()->add('Extension Loader', 'Cannot find file for "'.$ext.'" extension.');
				continue;
			}

			// Name of its class
			$class = 'ext_'.$ext;

			// Make sure it exists
			if (!class_exists($class)) {
				LinfoError::Fledging()->add('Extension Loader', 'Cannot find class for "'.$ext.'" extension.');
				continue;
			}

			// Handle version checking
			$min_version = defined($class.'::LINFO_MIN_VERSION') ? constant($class.'::LINFO_MIN_VERSION') : false; 
			if ($min_version !== false && strtolower(VERSION) != 'svn' && !version_compare(VERSION, $min_version, '>=')) {
				LinfoError::Fledging()->add('Extension Loader', '"'.$ext.'" extension requires at least Linfo v'.$min_version);
				continue;
			}

			// Load it
			$ext_class = new $class();

			// Deal with it
			$ext_class->work();
			
			// Does this edit the $info directly, instead of creating a separate output table type thing?
			if (!defined($class.'::LINFO_INTEGRATE')) {

				// Result
				$result = $ext_class->result();

				// Save result if it's good
				if ($result != false)
					$info['extensions'][$ext] = $result;
			}
		}
	}

	/**
	 * @return $attr
	 */	
	public function __get($attr)
	{
		if (isset($this->{$attr})) {
            return $this->{$attr};
        }
        return $attr;
	}

}