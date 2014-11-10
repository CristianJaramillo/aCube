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

Route::get('widget', function()
{
	echo Widget::body('content', '<h1>First Widget</h1>')->options('editbutton', false)->header('title', '<h2>SmartUI::Tab</h2>')->print_html();
	dd();
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
	Route::get('app/{app_name}', ['as' => 'app', 'uses' => 'DashboardController@app']);

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