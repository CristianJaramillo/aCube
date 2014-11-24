<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/
//\Debugbar::disable();
/*
 |--------------------------------------------------------------------------
 | GLOBAL ROUTES
 |--------------------------------------------------------------------------
 */

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
	 | logout route
	 */
	Route::get('logout', ['as' => 'logout', 'uses' => 'SessionController@logout']);

	/*
	 |----------------------------------------------------------------------
	 | AUTH FOR APPS GROUP ROUTES
	 |----------------------------------------------------------------------
	 */
	Route::group(['before' => array('auth.ajax')], function(){
		/*
		 | dashboard route
		 */
		Route::get('dashboard', ['uses' => 'DashboardController@app']);
		/*
		 | datatable/users route
		 */
		Route::get('datatable', ['uses' => 'DataTableController@app']);
	});

	/*
	 |----------------------------------------------------------------------
	 | AUTH FOR PAGES GROUP ROUTES
	 |----------------------------------------------------------------------
	 */
	Route::group(['before' => 'auth.page'], function(){
		/*
		 | dashboard route
		 */
		Route::get('/', ['as' => 'dashboard', 'uses' => 'DashboardController@show']);
	});

	/*
	 |----------------------------------------------------------------------
	 | AUTH FOR RESOURCES GROUP ROUTES
	 |----------------------------------------------------------------------
	 */
	Route::group([], function(){
		/*
		 | ajax/{app} route
		 */
		Route::get('ajax/{app}', function($app){
			return "<h1 style=\"text-align:center;\">" . $app . "</h1>";
		});
		/*
		 | linfo/json/{name} route
		 */
		Route::get('linfo/json/{name}', ['as' => 'linfo-json', 'uses' => 'LinfoController@json']);
		/*
		 | linfo/widget/{name} route
		 */
		Route::get('linfo/widget/{name}', ['as' => 'linfo-widget', 'uses' => 'LinfoController@widget']);		
	});

	/*
	 | CSRT security group
	 */
	Route::group(array('before' => 'csrf'), function(){
		/*
		 | user/json/{method} route
		 */
		Route::post('user/json/{method}', ['uses' => 'UserController@json']);
	});

});
/*
 |--------------------------------------------------------------------------
 | END AUTH PRIVATE GROUP ROUTES
 |--------------------------------------------------------------------------
 */