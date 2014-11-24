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

		$this->call('CategoriesTableSeeder');
		$this->call('ApiRoutesTableSeeder');
		$this->call('CategoryApiRoutePermsTableSeeder');
		$this->call('PagesTableSeeder');
		$this->call('CategoryPagePermsTableSeeder');
		$this->call('NavigationAppsTableSeeder');
		$this->call('CategoryNavigationAppPermsTableSeeder');
		$this->call('UsersTableSeeder');
	}

}
