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
				'app'  => 'apps.login',
			],
			[
				'name' => '401',
				'app'  => 'errors.401',
			],
			[
				'name' => '403',
				'app'  => 'errors.403',
			],
			[
				'name' => '404',
				'app'  => 'errors.404',
			],
			[
				'name' => '500',
				'app'  => 'errors.500',
			],
		];

		foreach ($pages as $page) {
			Page::create($page);
		}

	}

}