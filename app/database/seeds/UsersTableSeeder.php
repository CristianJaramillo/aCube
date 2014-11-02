<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use aCube\Entities\User;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$users = array();

		foreach(range(1, 5) as $index)
		{
			User::create([
				'full_name'  => $faker->name,
				'username'   => $faker->userName,
				'password'   => '1233456',
				'email'      => $faker->email,
				'authorized' => $faker->randomElement(array('off', 'on')),
			]);
		}

	}

}