<?php

// Composer: "fzaninotto/faker": "v1.3.0"

use Faker\Factory as Faker;
use aCube\Entities\Page;

class PagesTableSeeder extends Seeder {

	public function run()
	{

		/**
		 * Páginas por defecto para la aplicación.
		 */
		$pages = [
			[
				'name' => 'login',
			],
		];

		foreach ($pages as $page) {
			Page::create($page);
		}

	}

}