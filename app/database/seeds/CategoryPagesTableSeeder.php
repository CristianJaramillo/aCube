<?php

use aCube\Entities\CategoryPage;

class CategoryPagesTableSeeder extends Seeder {

	public function run()
	{
		
		$categoryPages = array(
				array(
					'category_id' => 1,
					'page_id'     => 1,
					'type'        => 'layout'
				),
				array(
					'category_id' => 1,
					'page_id'     => 3,
				),
				array(
					'category_id' => 1,
					'page_id'     => 2,
				),				
			);

		foreach ($categoryPages as $categoryPage) {
			CategoryPage::create($categoryPage);			
		}

	}

}