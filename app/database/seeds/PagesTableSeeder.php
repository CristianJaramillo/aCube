<?php

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
				'name' => 'sign-up',
				'app'  => 'apps.sign-up',
			],
			[
				'name' => 'forgotpassword',
				'app'  => 'apps.forgotpassword',
			],
			[
				'name' => 'dashboard',
				'app'  => 'apps.dashboard',
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
