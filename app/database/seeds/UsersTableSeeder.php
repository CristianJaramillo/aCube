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
					'full_name'   => 'Anton Krall',
					'username'    => 'Anton',
					'password'    => 'friki454_',
					'email'       => 'Krall@intruder.mx',
					'category_id' => 1,
					'authorized'  => 'on',
				),
				array(
					'full_name'   => 'Andres Alvarado',
					'username'    => 'Andres',
					'password'    => 'friki454_',
					'email'       => 'andres@intruder.mx',
					'category_id' => 1,
					'authorized'  => 'on',
				),
				array(
					'full_name'   => 'Cristian Jaramillo',
					'username'    => 'Cristian',
					'password'    => 'friki454_',
					'email'       => 'cristian@intruder.mx',
					'category_id' => 1,
					'authorized'  => 'on',
				),
				array(
					'full_name'   => 'Allan Silva',
					'username'    => 'Allan',
					'password'    => 'intruder',
					'email'       => 'allan@intruder.mx',
					'category_id' => 1,
					'authorized'  => 'on',
				),
				array(
					'full_name'   => 'David Garrido',
					'username'    => 'David',
					'password'    => 'intruder',
					'email'       => 'david@intruder.mx',
					'category_id' => 1,
					'authorized'  => 'on',
				),
			);

		foreach ($users as $user)
		{
			User::create($user);
		}

	}

}