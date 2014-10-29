<?php

use aCube\Entities\Route;

class RoutesTableSeeder extends Seeder {

	public function run()
	{
		$routes = array(
				[
					'route_type_id' => 1,
					'prefix'        => '_XXXXXXXX',
				],
				[
					'route_type_id' => 1,
					'prefix'        => '_55XXXXXXXX',
				],
				[
					'route_type_id' => 1,
					'prefix'        => '_0XX',
				],
				[
					'route_type_id' => 1,
					'prefix'        => '_01800XXXXXXX',
				],
				[
					'route_type_id' => 2,
					'prefix'        => '_044XXXXXXXXXX',
				],
				[
					'route_type_id' => 3,
					'prefix'        => '_045XXXXXXXXXX',
				],
				[
					'route_type_id' => 5,
					'prefix'        => '_00.',
				],
				[
					'route_type_id' => 4,
					'prefix'        => '_01[1-79]XXXXXXXXX',
				],
				[
					'route_type_id' => 4,
					'prefix'        => '_018ZXXXXXXX',
				],

			);

		foreach($routes as $route)
		{
			Route::create($route);
		}
	}

}