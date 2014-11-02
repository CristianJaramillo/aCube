<?php

class DashboardController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	|	Route::get('{url}', 'DashboardController@index');
	|
	*/

	/**
	 * POST ajax/{app}
	 *
	 * @param string $app
	 * @return \View
	 */
	public function ajax($app)
	{
		$this->addParam('app', $app);

		dd($this->params);
	}

}