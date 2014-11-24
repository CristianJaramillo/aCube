<?php

use aCube\Entities\NavigationApp;

class NavigationAppsTableSeeder extends Seeder {

	public function run()
	{
		$navigationApps = array(
				array(
					"name"  => "dashboard",
					"title" => "Dashboard",
					"url"   => "dashboard",
					"icon"  => "fa-home",
				),
				array(
					"name"  => "users",
					"title" => "Users",
					"icon"  => "fa-group",
				),
				array(
					"name"   => "all-users",
					"title"  => "All Users",
					"url"    => "datatable",
					"parent" => "users",
				),
				array(
					"name"   => "configurations",
					"title"  => "Configurations",
					"icon"   => "fa-gear",
				),
				array(
					"name"   => "n",
					"title"  => "Levels",
					"icon"   => "fa-folder",
				),
				array(
					"name"   => "n1",
					"title"  => "Level 1",
					"icon"   => "fa-folder",
					"parent" => "n",
				),
				array(
					"name"   => "n2",
					"title"  => "Level 2",
					"icon"   => "fa-folder",
					"parent" => "n.n1",
				),
				array(
					"name"   => "n3",
					"title"  => "Level 3",
					"icon"   => "fa-folder",
					"parent" => "n.n1.n2",
				),
				array(
					"name"   => "n4",
					"title"  => "Level 4",
					"icon"   => "fa-folder",
					"parent" => "n.n1.n2.n3",
				),
				array(
					"name"   => "n5",
					"title"  => "Level 5",
					"icon"   => "fa-folder",
					"parent" => "n.n1.n2.n3.n4",
				),
			);

		foreach($navigationApps as $navigationApp)
		{
			NavigationApp::create($navigationApp);
		}
	}

}