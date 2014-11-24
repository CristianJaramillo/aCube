<?php

use aCube\Entities\CategoryNavigationAppPerm;

class CategoryNavigationAppPermsTableSeeder extends Seeder {

	public function run()
	{
		$categoryNavigationAppPerms = array();

		foreach (range(1, 10) as $index) {
			$categoryNavigationAppPerms[] = array(
					'category_id' => 1,
					'navigation_app_id' => $index,
				);
		}

		foreach ($categoryNavigationAppPerms as $categoryNavigationAppPerm)
		{
			CategoryNavigationAppPerm::create($categoryNavigationAppPerm);	
		}
	}

}