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

/*
 | logout route
 */
Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);

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
Route::group(array('before' => 'guest'), function(){
	
	/*
	 | login route
	 */
	Route::get('/', ['as' => 'login', 'uses' => 'HomeController@index']);
	/*
	 | sing-up route
	 */
	Route::get('sign-up', ['as' => 'sign-up', 'uses' => 'HomeController@index']);
	/*
	 | forgotpassword route
	 */
	 Route::get('forgotpassword', ['as' => 'forgotpassword', 'uses' => 'HomeController@index']);

	/*
	 | CSRT security group
	 */
	Route::group(array('before' => 'csrf'), function(){
		/*
		 | sign-in route 
		 */
		Route::post('/', ['as' => 'sign-in', 'uses' => 'AuthController@login']);
		/*
		 | register router
		 */
		 Route::post('register', ['as' => 'register', 'uses' => 'HomeController@register']);
		/*
		 | forgot route
		 */
		Route::post('forgot', ['as' => 'forgot', 'uses' => 'HomeController@forgot']);
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
Route::group(array('before' => 'auth'), function(){
	
	/*
	 | dashboard route
	 */
	Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
	/*
	 | ajax/{app} route
	 */
	Route::get('ajax/{app}', ['uses' => 'DashboardController@ajax']);

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