<?php

use aCube\Entities\NavigationApp;

class NavigationAppsTableSeeder extends Seeder {

	public function run()
	{
		$navigationApps = array(
				array(
					'name'  => 'dashboard',
					'title' => 'Dashboard',
					'url'   => 'dashboard',
					'icon'  => 'fa-home'
				),
			);

		foreach($navigationApps as $navigationApp)
		{
			NavigationApp::create($navigationApp);
		}
	}

}