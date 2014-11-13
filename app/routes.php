<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

// Debugbar::disable();

/*
 |--------------------------------------------------------------------------
 | GLOBAL ROUTES
 |--------------------------------------------------------------------------
 */

use Linfo\OS\OS_Windows;
Route::get('windows', function(){
	$windows = new OS_Windows(array(
			'dates' => 'm/d/y h:i A (T)'
		));

	$core = array(
			'os'     => $windows->getOS(),
			'kernel' => $windows->getKernel(),
			'accessed_ip' => isset($_SERVER['SERVER_ADDR']) ? $_SERVER['SERVER_ADDR'] : 'Unknown',
			'upTime' => $windows->getUpTime(),
			'hostname' => $windows->getHostName(),
			'cpus'   => $windows->getCPU(),
			'cpu_arch' => $windows->getCPUArchitecture(),
			'load'   => $windows->getLoad(),
			'process_stats' => $windows->getProcessStats()
		);

	$device = $windows->getDevs();

	$memory = $windows->getRam();

	$mount = $windows->getMounts();
	
	$network = $windows->getNet();

	$hd = $windows->getHD();

	$sound_cards = $windows->getSoundCards();

	dd(array($core, $device, $memory, $mount, $network, $hd, $sound_cards));
});

/*
 |--------------------------------------------------------------------------
 | END GLOBAL ROUTES
 |--------------------------------------------------------------------------
 */

/*
 |--------------------------------------------------------------------------
 | GUEST PUBLIC GROUP ROUTES
 |--------------------------------------------------------------------------
 */
Route::group(array('before' => array('guest')), function(){
	
	/*
	 | login route
	 */
	Route::get('login', ['as' => 'login', 'uses' => 'SessionController@index']);
	/*
	 | sing-up route
	 */
	Route::get('sign-up', ['as' => 'sign-up', 'uses' => 'SessionController@signUp']);
	/*
	 | password-reset route
	 */
	 Route::get('password-reset', ['as' => 'forgotpassword', 'uses' => 'SessionController@passwordReset']);

	/*
	 | CSRF security group
	 */
	Route::group(array('before' => 'csrf'), function(){
	
		/*
		 | sign-in route 
		 */
		Route::post('login', ['as' => 'sign-in', 'uses' => 'SessionController@login']);
		/*
		 | register router
		 */
		 Route::post('register', ['as' => 'register', 'uses' => 'SessionController@register']);
		/*
		 | forgot route
		 */
		Route::post('forgot', ['as' => 'forgot', 'uses' => 'SessionController@forgot']);
	
	});

});
/*
 |--------------------------------------------------------------------------
 | END GUEST PUBLIC GROUP ROUTES
 |--------------------------------------------------------------------------
 */

/*
 |--------------------------------------------------------------------------
 | AUTH PRIVATE GROUP ROUTES
 |--------------------------------------------------------------------------
 */
Route::group(['before' => 'auth'], function(){
	
	/*
	 | dashboard route
	 */
	Route::get('/', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
	/*
	 | logout route
	 */
	Route::get('logout', ['as' => 'logout', 'uses' => 'SessionController@logout']);

	/*
	 | app/{name} route
	 */
	Route::get('app/dashboard', ['as' => 'app-dashboard', 'uses' => 'DashboardController@app']);

	/*
	 | app/{name} route
	 */
	Route::get('apps/blank', ['as' => 'app-blank', 'uses' => 'DashboardController@app']);


	/*
	 | CSRT security group
	 */
	Route::group(array('before' => 'csrf'), function(){
		
	});

});
/*
 |--------------------------------------------------------------------------
 | END AUTH PRIVATE GROUP ROUTES
 |--------------------------------------------------------------------------
 */