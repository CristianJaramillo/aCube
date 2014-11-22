<?php

use aCube\Entities\User;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$users = array(
				array(
					'full_name'   => 'Allan Silva',
					'password'    => 'intruder',
					'email'       => 'allan@intruder.mx',
					'category_id' => 3,
					'authorized'  => 'on',
				),
				array(
					'full_name'   => 'Andres Alvarado',
					'password'    => 'intruder',
					'email'       => 'andres@intruder.mx',
					'category_id' => 4,
					'authorized'  => 'on',
				),
				array(
					'full_name'   => 'Anton Krall',
					'password'    => 'intruder',
					'email'       => 'aKrall@intruder.mx',
					'category_id' => 4,
					'authorized'  => 'on',
				),
				array(
					'full_name'   => 'Arturo Aguirre',
					'password'    => 'intruder',
					'email'       => 'arturo@intruder.mx',
					'category_id' => 2,
					'authorized'  => 'on',
				),
				array(
					'full_name'   => 'Cristian Jaramillo',
					'password'    => 'friki454_',
					'email'       => 'cristian@intruder.mx',
					'category_id' => 1,
					'authorized'  => 'on',
				),
				array(
					'full_name'   => 'David Garrido',
					'password'    => 'intruder',
					'email'       => 'david@intruder.mx',
					'category_id' => 3,
					'authorized'  => 'on',
				),
			);

		foreach ($users as $user)
		{
			User::create($user);
		}
	}

}