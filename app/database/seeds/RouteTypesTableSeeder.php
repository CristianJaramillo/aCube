<?php

use aCube\Entities\RouteType;

class RouteTypesTableSeeder extends Seeder {

	public function run()
	{

		$routeTypes = [
			['name' => 'local'],
			['name' => 'cel'],
			['name' => 'ld_cel'],
			['name' => 'ld_nat'],
			['name' => 'ld_intl'],
		];

		foreach($routeTypes as $routeType)
		{
			RouteType::create($routeType);
		}
	}

}