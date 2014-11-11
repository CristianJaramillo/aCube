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
use ZetaComponents\SystemInformation\ezcSystemInfo;
use ZetaComponents\SystemInformation\Readers\ezcSystemInfoWindowsReader;

Route::get('info', function(){
	$info = new ezcSystemInfoWindowsReader();
	$memory = win32_ps_stat_mem();
	
	foreach ($memory as $key => $value) {
		if($key!='load') $value = formatBytes($value);
		echo $key . "->". $value . '<br/>';
	}

	$dev = './';   
    $freespace = disk_free_space($dev);   
	$totalspace = disk_total_space($dev);   
	$freespace_mb = $freespace/1024/1024;   
	$totalspace_mb = $totalspace/1024/1024;   
	$freespace_percent = ($freespace/$totalspace)*100;   
	//$used_percent = (1-($freespace/$totalspace))*100; 
	// dar formato a los datos obtenidos 
	                     
	$freespace_mb=number_format($freespace_mb,0,",","."); 

	$freespace_percent=number_format($freespace_percent,2,",","."); 

	echo "<br />"; 
	echo "Espacio libre en disco: $freespace_mb Mb <br /><br />"; 
	echo "Porcentaje de espacio libre: $freespace_percent %";  

	dd($info);
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