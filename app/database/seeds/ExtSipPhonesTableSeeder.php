<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use aCube\Entities\ExtSipPhone;
use aCube\Entities\User;

class ExtSipPhonesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$list_id_users = User::all()->lists('id');
		foreach(range(1, 10) as $index)
		{
			$id = $faker->randomElement($list_id_users);
			$name = 99 + $index;
			$user = User::find($id);
			ExtSipPhone::create([
				'user_id'     => $user->id,
				'name'        => $name,
				'secret'      => 'acube',
				'accountcode' => '<' + $user->full_name + ' ' + ($name) + '>',
				'callerid'    => $name,
			]);
		}
	}

}