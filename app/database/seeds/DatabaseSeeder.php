<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('PagesTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('ExtSipPhonesTableSeeder');
		$this->call('RouteTypesTableSeeder');
		$this->call('RoutesTableSeeder');
		$this->call('ExtSipPermsTableSeeder');

	}

}
