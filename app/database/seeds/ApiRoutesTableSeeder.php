<?php

use aCube\Entities\ApiRoute;

class ApiRoutesTableSeeder extends Seeder {

	public function run()
	{
		$apiRoutes = array(
				array(
					'name'   => 'linfo-json',
					'uri'    => 'linfo/json/{name}',
					'url'    => 'linfo/json/core',
				),
				array(
					'name'   => 'linfo-json',
					'uri'    => 'linfo/json/{name}',
					'url'    => 'linfo/json/device',
				),
				array(
					'name'   => 'linfo-json',
					'uri'    => 'linfo/json/{name}',
					'url'    => 'linfo/json/memory',
				),
				array(
					'name'   => 'linfo-json',
					'uri'    => 'linfo/json/{name}',
					'url'    => 'linfo/json/mount',
				),
				array(
					'name'   => 'linfo-json',
					'uri'    => 'linfo/json/{name}',
					'url'    => 'linfo/json/network',
				),
				array(
					'name'   => 'linfo-widget',
					'uri'    => 'linfo/widget/{name}',
					'url'    => 'linfo/widget/core',
				),
				array(
					'name'   => 'linfo-widget',
					'uri'    => 'linfo/widget/{name}',
					'url'    => 'linfo/widget/device',
				),
				array(
					'name'   => 'linfo-widget',
					'uri'    => 'linfo/widget/{name}',
					'url'    => 'linfo/widget/memory',
				),
				array(
					'name'   => 'linfo-widget',
					'uri'    => 'linfo/widget/{name}',
					'url'    => 'linfo/widget/mount',
				),
				array(
					'name'   => 'linfo-widget',
					'uri'    => 'linfo/widget/{name}',
					'url'    => 'linfo/widget/network',
				),
				array(
					'name'   => 'user-json',
					'uri'    => 'user/json/{method}',
					'url'    => 'user/json/withAll',
					'method' => 'POST'
				),
			);
		foreach ($apiRoutes as $apiRoute)
		{
			ApiRoute::create($apiRoute);
		}
	}

}