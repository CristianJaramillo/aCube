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
				'password'   => $faker->password,
				'email'      => $faker->email,
				'authorized' => $faker->randomElement(array('false', 'true')),
			]);
		}

	}

}