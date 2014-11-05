<?php

use aCube\Entities\Category;

class CategoriesTableSeeder extends Seeder {

	public function run()
	{

		$categories = array(
				array(
					'name' => 'admin',
				),
				array(
					'name' => 'guest',
				),
			);

		foreach ($categories as $category)
		{
			Category::create($category);
		}

	}

}