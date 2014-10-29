<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use aCube\Entities\ExtSipPerm;
use aCube\Entities\ExtSipPhone;
use aCube\Entities\RouteType;

class ExtSipPermsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		// $sip_ids = ExtSipPhone::all()->lists('id'); 
		// $route_ids   = RouteType::all()->lists('id');

		foreach(range(1, 10) as $sip_id)
		{
			foreach (range(1, 5) as $route_id)
			{
				ExtSipPerm::create([
						'ext_sip_phone_id' => $sip_id,
						'route_type_id'    => $route_id,
						'perm'             => $faker->randomElement(array('no', 'password', 'yes')),
						'password'         => $faker->password,
					]);	
			}
		}
	}

}