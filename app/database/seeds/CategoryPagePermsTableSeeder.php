<?php

use aCube\Entities\CategoryPagePerm;

class CategoryPagePermsTableSeeder extends Seeder {

	public function run()
	{		
		$categoryPagePerms = array(
				array(
					'category_id' => 1,
					'page_id'     => 1,
				),
				array(
					'category_id' => 3,
					'page_id'     => 1,
				),
				array(
					'category_id' => 4,
					'page_id'     => 1,
				),
			);

		foreach ($categoryPagePerms as $categoryPagePerm)
		{
			CategoryPagePerm::create($categoryPagePerm);			
		}
	}

}