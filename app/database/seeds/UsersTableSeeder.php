<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use aCube\Entities\User;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$users = array(
				array(
					'full_name'   => 'Cristian Jaramillo',
					'username'    => 'cristianFX',
					'password'    => 'friki454_',
					'email'       => 'cristian@intruder.mx',
					'category_id' => 1,
					'authorized'  => 'on',
				),
			);

		foreach(range(1, 5) as $index)
		{
			$users[] = [
					'full_name'   => $faker->name,
					'username'    => $faker->userName,
					'password'    => 'intruder',
					'email'       => $faker->email,
					'category_id' => 2,
					'authorized'  => $faker->randomElement(array('off', 'on')),
				];
		}

		foreach ($users as $user)
		{
			User::create($user);
		}

	}

}