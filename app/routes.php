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

Route::get('core', function(){
	
	$settings = array();

	/*
	 * Usual configuration
	 */
	$settings['byte_notation'] = 1024; // Either 1024 or 1000; defaults to 1024
	$settings['dates'] = 'm/d/y h:i A (T)'; // Format for dates shown. See php.net/date for syntax
	$settings['language'] = 'en'; // Refer to the lang/ folder for supported lanugages
	$settings['icons'] = true; // simple icons 

	$settings['show']['os'] = true;

	$windows = new OS_Windows($settings);
	return $windows->getOS();
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