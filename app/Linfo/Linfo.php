<?php namespace Linfo;

use Linfo\Get\GetInfoException;

class Linfo extends Base
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
	protected $memorySystem = array();

	/**
	 * @var array
	 */
	protected $network = array();

	/**
	 * @return void
	 */
	public function __construct()
	{
		$this->settings = $this->getSettings();
		$this->setupInfo();
		$this->setupCore($this->info, $this->settings);
		$this->setupDevice($this->info, $this->settings);
		$this->setupMemory($this->info, $this->settings);
		$this->setupMemorySystem($this->info, $this->settings);
		$this->setupNetwork($this->info, $this->settings);
	}

	/**
	 * @return array
	 */
	public function getSettings()
	{
		/*
		 * Usual configuration
		 */
		$settings['byte_notation'] = 1024; // Either 1024 or 1000; defaults to 1024
		$settings['dates'] = 'm/d/y h:i A (T)'; // Format for dates shown. See php.net/date for syntax
		$settings['language'] = 'en'; // Refer to the lang/ folder for supported lanugages
		$settings['icons'] = true; // simple icons 

		/*
		 * Possibly don't show stuff
		 */

		// For certain reasons, some might choose to not display all we can
		// Set these to true to enable; false to disable. They default to false.
		$settings['show']['kernel'] = true;
		$settings['show']['os'] = true;
		$settings['show']['load'] = true;
		$settings['show']['ram'] = true;
		$settings['show']['hd'] = true;
		$settings['show']['mounts'] = true;
		$settings['show']['mounts_options'] = false; // Might be useless/confidential information; disabled by default.
		$settings['show']['network'] = true;
		$settings['show']['uptime'] = true;
		$settings['show']['cpu'] = true;
		$settings['show']['process_stats'] = true; 
		$settings['show']['hostname'] = true;
		$settings['show']['distro'] = true; # Attempt finding name and version of distribution on Linux systems
		$settings['show']['devices'] = true; # Slow on old systems
		$settings['show']['model'] = true; # Model of system. Supported on certain OS's. ex: Macbook Pro
		$settings['show']['numLoggedIn'] = true; # Number of unqiue users with shells running (on Linux)

		// Sometimes a filesystem mount is mounted more than once. Only list the first one I see? 
		// (note, duplicates are not shown twice in the file system totals)
		$settings['show']['duplicate_mounts'] = true;

		// Disabled by default as they require extra config below
		$settings['show']['temps'] = false;
		$settings['show']['raid'] = false; 

		// Following are probably only useful on laptop/desktop/workstation systems, not servers, although they work just as well
		$settings['show']['battery'] = false;
		$settings['show']['sound'] = false;
		$settings['show']['wifi'] = false; # Not finished

		// Service monitoring
		$settings['show']['services'] = false;

		/*
		 * Misc settings pertaining to the above follow below:
		 */

		// Hide certain file systems / devices
		$settings['hide']['filesystems'] = [
			'tmpfs', 'ecryptfs', 'nfsd', 'rpc_pipefs',
			'usbfs', 'devpts', 'fusectl', 'securityfs', 'fuse.truecrypt'];
		$settings['hide']['storage_devices'] = ['gvfs-fuse-daemon', 'none'];

		// Hide mount options for these file systems. (very, very suggested, especially the ecryptfs ones)
		$settings['hide']['fs_mount_options'] = ['ecryptfs'];

		// Hide hard drives that begin with /dev/sg?. These are duplicates of usual ones, like /dev/sd?
		$settings['hide']['sg'] = true; # Linux only

		// Various softraids. Set to true to enable.
		// Only works if it's available on your system; otherwise does nothing
		$settings['raid']['gmirror'] = false;  # For FreeBSD
		$settings['raid']['mdadm'] = false;  # For Linux; known to support RAID 1, 5, and 6

		// Various ways of getting temps/voltages/etc. Set to true to enable. Currently these are just for Linux
		$settings['temps']['hwmon'] = true; // Requires no extra config, is fast, and is in /sys :)
		$settings['temps']['hddtemp'] = false;
		$settings['temps']['mbmon'] = false;
		$settings['temps']['sensord'] = false; // Part of lm-sensors; logs periodically to syslog. slow

		// Configuration for getting temps with hddtemp
		$settings['hddtemp']['mode'] = 'daemon'; // Either daemon or syslog
		$settings['hddtemp']['address'] = [ // Address/Port of hddtemp daemon to connect to
			'host' => 'localhost',
			'port' => 7634
		];
		// Configuration for getting temps with mbmon
		$settings['mbmon']['address'] = [ // Address/Port of mbmon daemon to connect to
			'host' => 'localhost',
			'port' => 411
		];

		/*
		 * For the things that require executing external programs, such as non-linux OS's
		 * and the extensions, you may specify other paths to search for them here:
		 */
		$settings['additional_paths'] = [
			 //'/opt/bin' # for example
		];


		/*
		 * Services. It works by specifying locations to PID files, which then get checked
		 * Either that or specifying a path to the executable, which we'll try to find a running
		 * process PID entry for. It'll stop on the first it finds.
		 */

		// Format: Label => pid file path
		$settings['services']['pidFiles'] = [
			// 'Apache' => '/var/run/apache2.pid', // uncomment to enable
			// 'SSHd' => '/var/run/sshd.pid'
		];

		// Format: Label => path to executable or array containing arguments to be checked
		$settings['services']['executables'] = [
			// 'MySQLd' => '/usr/sbin/mysqld' // uncomment to enable
			// 'BuildSlave' => array('/usr/bin/python', // executable
			//						1 => '/usr/local/bin/buildslave') // argv[1]
		];

		/*
		 * Debugging settings
		 */

		// Show errors? Disabled by default to hide vulnerabilities / attributes on the server
		$settings['show_errors'] = false;

		// Show results from timing ourselves? Similar to above.
		// Lets you see how much time getting each bit of info takes.
		$settings['timer'] = false;

		// Compress content, can be turned off to view error messages in browser
		$settings['compress_content'] = true;

		/*
		 * Occasional sudo
		 * Sometimes you may want to have one of the external commands here be ran as root with
		 * sudo. This requires the web server user be set to "NOPASS" in your sudoers so the sudo 
		 * command just works without a prompt.
		 *
		 * Add names of commands to the array if this is what you want. Just the name of the command;
		 * not the complete path. This also applies to commands called by extensions.
		 *
		 * Note: this is extremely dangerous if done wrong
		 */
		$settings['sudo_apps'] = []; //'ps' // For example

		return $settings;
	}

	/**
	 * @return void
	 */
	public function setupCore($info, $settings)
	{
		$core = array();
		// OS? (with icon, if we have it)
		if (!empty($settings['show']['os']))
			$core[] = array('os', $info['OS']);
		
		// Distribution? (with icon, if we have it)
		if (!empty($settings['show']['distro']) && array_key_exists('Distro', $info) && is_array($info['Distro']))
			$core[] = array('distro', $info['Distro']['name'] . ($info['Distro']['version'] ? ' - '.$info['Distro']['version'] : ''));
		
		// Kernel
		if (!empty($settings['show']['kernel']))
			$core[] = array('kernel',  $info['Kernel']);

		// Model?
		if (!empty($settings['show']['model']) && array_key_exists('Model', $info) && !empty($info['Model']))
			$core[] = array('model', $info['Model']);

		// IP
		$core[] = array('accessed_ip', isset($_SERVER['SERVER_ADDR']) ? $_SERVER['SERVER_ADDR'] : 'Unknown');

		// Uptime
		if (!empty($settings['show']['uptime']))
			$core[] = array('uptime', $info['UpTime']);
		
		// Hostname
		if (!empty($settings['show']['hostname']))
			$core[] = array('hostname', $info['HostName']);
		
		// The CPUs
		if (!empty($settings['show']['cpu'])) {
			$cpus = '';
			foreach ((array) $info['CPU'] as $cpu) 
				$cpus .=
					(array_key_exists('Vendor', $cpu) && !empty($cpu['Vendor']) ? $cpu['Vendor'] . ' - ' : '') .
					$cpu['Model'] .
					(array_key_exists('MHz', $cpu) ?
						($cpu['MHz'] < 1000 ? ' ('.$cpu['MHz'].' MHz)' : ' ('.round($cpu['MHz'] / 1000, 3).' GHz)') : '') .
						'<br />';
			$core[] = array('CPUs ('.count($info['CPU']).')', $cpus);
		}

		// CPU architecture. Permissions goes hand in hand with normal CPU
		if (!empty($settings['show']['cpu']) && array_key_exists('CPUArchitecture', $info)) 
			$core[] = array('cpu_arch', $info['CPUArchitecture']);
		
		// System Load
		if (!empty($settings['show']['load']))
			$core[] = array('load', implode(' ', (array) $info['Load']));
		
		// We very well may not have process stats
		if (!empty($settings['show']['process_stats']) && $info['processStats']['exists']) {

			// Different os' have different keys of shit
			$proc_stats = array();
			
			// Load the keys
			if (array_key_exists('totals', $info['processStats']) && is_array($info['processStats']['totals']))
				foreach ($info['processStats']['totals'] as $k => $v) 
					$proc_stats[] = $k . ': ' . number_format($v);

			// Total as well
			$proc_stats[] = 'total: ' . number_format($info['processStats']['proc_total']);

			// Show them
			$core[] = array('processes', implode('; ', $proc_stats));

			// We might not have threads
			if ($info['processStats']['threads'] !== false)
				$core[] = array('threads', number_format($info['processStats']['threads']));
		}
		
		// Users with active shells
		if (!empty($settings['show']['numLoggedIn']) && array_key_exists('numLoggedIn', $info))
			$core[] = array('numLoggedIn', $info['numLoggedIn']);
		$this->core = $core;
	}

		/**
	 * @return void
	 */
	public function setupDevice($info, $settings)
	{
		$device = array();
		// Show hardware?
		if (!empty($settings['show']['devices']))
		{
			// Don't show vendor?
		$show_vendor = array_key_exists('hw_vendor', $info['contains']) ? ($info['contains']['hw_vendor'] === false ? false : true) : true;

			$num_devs = count($info['Devices']);
			if ($num_devs > 0) {
				for ($i = 0; $i < $num_devs; $i++) {
					$device[] = [
							$info['Devices'][$i]['type'],
							$show_vendor ? ($info['Devices'][$i]['vendor'] ? $info['Devices'][$i]['vendor'] : 'Unknown') : '',
							$info['Devices'][$i]['device'],
						];
				}
			}
		}

		$this->device = $device;
	}

	/**
	 * @return void
	 */
	public function setupMemory($info, $settings)
	{
		$memory = array();
		// Show memory?
		if (!empty($settings['show']['ram'])) {
			$memory[] = [
					$info['RAM']['type'],
					byte_convert($info['RAM']['free']),
					byte_convert($info['RAM']['total'] - $info['RAM']['free']),
					byte_convert($info['RAM']['total'])
				];
		}
		$this->memory = $memory;
	}

	/**
	 * @return void
	 */
	public function setupMemorySystem($info, $settings)
	{
		$memorySystem = array();

		// Show file system mounts?
		if (!empty($settings['show']['mounts']))
		{

			// Calc totals
			$total_size = 0;
			$total_used = 0;
			$total_free = 0;

			// Don't add totals for duplicates. (same filesystem mount twice in different places)
			$done_devices = array();

			// Are there any?
			if (count($info['Mounts']) > 0)
			{
				// Go through each
				foreach($info['Mounts'] as $mount)
				{

					// Only add totals for this device if we haven't already
					if (!in_array($mount['device'], $done_devices)) {
						$total_size += $mount['size'];
						$total_used += $mount['used'];
						$total_free += $mount['free'];
						if (!empty($mount['device'])) 
							$done_devices[] = $mount['device'];
					}

					// Possibly don't show this twice
					else if (array_key_exists('duplicate_mounts', $settings['show']) && empty($settings['show']['duplicate_mounts']))
						continue;

					// If it's an NFS mount it's likely in the form of server:path (without a trailing slash), 
					// but if the path is just / it likely just shows up as server:,
					// which is vague. If there isn't a /, add one
					if (preg_match('/^.+:$/', $mount['device']) == 1)
						$mount['device'] .= DIRECTORY_SEPARATOR;
					
					$memorySystem[] = [
							'Fixed drive',
							$mount['type'], 
							$settings['show']['mounts_options'] ? (empty($mount['options']) ? '<em>unknown</em>' : '<ul><li>'.implode('</li><li>', $mount['options']).'</li></ul>') : '',
							byte_convert($mount['size']),
							byte_convert($mount['used']) . '<span class="perc">('.($mount['used_percent'] !== false ? $mount['used_percent'] : 'N/A').'%)</span>',
							byte_convert($mount['free']) . '<span class="perc">('.($mount['free_percent'] !== false ? $mount['free_percent'] : 'N/A').'%)</span>',
							$mount['used_percent'] ? $mount['used_percent'].'%' : 'N/A'
						];
				}
			}

			// Show totals and finish table
			$total_used_perc = $total_size > 0 && $total_used > 0 ?  round($total_used / $total_size, 2) * 100 : 0;
		
			$memorySystem[] = [
					'Totals:',
					'',
					'',
					byte_convert($total_size),
					byte_convert($total_used),
					byte_convert($total_free),
					$total_used_perc .'%'
				];
		}
		$this->memorySystem = $memorySystem;
	}

	/**
	 * @return void
	 */
	public function setupNetwork($info, $settings)
	{
		$network = array();
		// Network Devices?
		if (!empty($settings['show']['network'])) {
			if (count($info['Network Devices']) > 0)
			{
				foreach($info['Network Devices'] as $device => $stats)
				{
					$network[] = [
							$device,
							$stats['type'],
							byte_convert($stats['sent']['bytes']),
							byte_convert($stats['recieved']['bytes']),
							ucfirst($stats['state'])
						];
				}
			}
		}
		$this->network = $network;
	}

	/**
	 * @return void
	 */
	public function setupInfo()
	{
		// Default timeformat
		$this->settings['dates'] = array_key_exists('dates', $this->settings) ? $this->settings['dates'] : 'm/d/y h:i A (T)';
		// Default to english translation.
		$this->settings['language'] = \Config::get('app.locale');
		// Don't just blindly assume we have the ob_* functions...
		if (!function_exists('ob_start'))
			$settings['compress_content'] = false;
		$this->lang = \Lang::get('utils.linfo');
		// Determine our OS
		$this->os = $this->determineOS();
		// Cannot?
		if ($this->os == false) {
			throw new GetInfoException("Unknown/Unsupported Operating System: " . PHP_OS);
		}
		// Get info
		$getter = $this->loadSystemOsClass($this->os, $this->settings);
		$info = $getter->getAll();
	
		// Store current timestamp for alternative output formats
		$info['timestamp'] = date('c');
		// Make sure we have an array of what not to show
		$info['contains'] = array_key_exists('contains', $info) ? (array) $info['contains'] : array();
		$this->info = $info;
	}

}