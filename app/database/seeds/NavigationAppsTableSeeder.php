<?php

use aCube\Entities\NavigationApp;

class NavigationAppsTableSeeder extends Seeder {

	public function run()
	{
		$navigationApps = array(
				array(
					"name"  => "dashboard",
					"title" => "Dashboard",
					"url"   => "dashboard",
					"icon"  => "fa-home",
				),
				array(
					"name"  => "smartui",
					"title" => "Smart UI",
					"icon"  => "fa-code",
				),
				array(
					"name"   => "general",
					"title"  => "General Elements",
					"icon"   => "fa-folder-open",
					"parent" => "smartui",
				),
				array(
					"name"   => "alert",
					"title"  => "Alerts",
					"url"    => "ajax/smartui-alert.php",
					"parent" => "smartui.general",
				),
				array(
					"name"   => "progress",
					"title"  => "Progress",
					"url"    => "ajax/smartui-progress.php",
					"parent" => "smartui.general",
				),
				array(
					"name"  => "carousel",
					"title" => "Carousel",
					"url"   => "ajax/smartui-carousel.php",
					"parent" => "smartui",
				),
				array(
					"name"  => "tab",
					"title" => "Tab",
					"url"   => "ajax/smartui-tab.php",
					"parent" => "smartui",
				),
				array(
					"name"  => "accordion",
					"title" => "Accordion",
					"url"   => "ajax/smartui-accordion.php",
					"parent" => "smartui",
				),
				array(
					"name"  => "widget",
					"title" => "Widget",
					"url"   => "ajax/smartui-widget.php",
					"parent" => "smartui",
				),
				array(
					"name"  => "datatable",
					"title" => "DataTable",
					"url"   => "ajax/smartui-datatable.php",
					"parent" => "smartui",
				),
				array(
					"name"  => "button",
					"title" => "Button",
					"url"   => "ajax/smartui-button.php",
					"parent" => "smartui",
				),
				array(
					"name"  => "smartform",
					"title" => "Smart Form",
					"url"   => "ajax/smartui-form.php",
					"parent" => "smartui",
				)
			);

		foreach($navigationApps as $navigationApp)
		{
			NavigationApp::create($navigationApp);
		}
	}

}