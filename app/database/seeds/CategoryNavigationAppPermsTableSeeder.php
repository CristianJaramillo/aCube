<?php

use aCube\Entities\CategoryNavigationAppPerm;

class CategoryNavigationAppPermsTableSeeder extends Seeder {

	public function run()
	{
		$categoryNavigationAppPerms = array(
				array(
					'category_id' => 1,
					'navigation_app_id' => 1
				),
			);

		foreach ($categoryNavigationAppPerms as $categoryNavigationAppPerm)
		{
			CategoryNavigationAppPerm::create($categoryNavigationAppPerm);	
		}
	}

}