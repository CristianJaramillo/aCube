<?php

use aCube\Entities\NavigationApp;

class NavigationAppsTableSeeder extends Seeder {

	public function run()
	{
		$navigationApps = array(
				array(
					"name"  => "welcome",
					"title" => "Home",
					"url"   => "dashboard",
					"icon"  => "fa-home",
				),
				array(
					"name"  => "admin",
					"title" => "Administraci&oacute;n"
				),
				array(
					"name"   => "firewall",
					"title"  => "Firewall",
					"parent" => "admin",
				),
				array(
					"name"   => "roles",
					"title"  => "Roles",
					"parent" => "admin",
				),
				array(
					"name"   => "extensions",
					"title"  => "Extensiones",
					"parent" => "admin.roles",
				),

				array(
					"name"  => "config",
					"title" => "Configuraciones"
				),
				array(
					"name"   => "dial-plan",
					"title"  => "Dial Plan",
					"parent" => "config",
				),
				array(
					"name"   => "ivr",
					"title"  => "IVR",
					"parent" => "config",
				),
				array(
					"name"   => "trunks",
					"title"  => "Trunks",
					"parent" => "config",
				),

				array(
					"name"  => "server",
					"title" => "Servidor"
				),
				array(
					"name"   => "license",
					"title"  => "Licencia",
					"parent" => "server",
				),
				array(
					"name"   => "services",
					"title"  => "Servicios",
					"parent" => "server",
				),
				array(
					"name"   => "resources",
					"title"  => "Recursos",
					"parent" => "server",
				),
				array(
					"name"  => "report",
					"title" => "Reportes"
				),
				array(
					"name"   => "cdr",
					"title"  => "CDR",
					"parent" => "report",
				),
				array(
					"name"   => "call-center",
					"title"  => "Call Center",
					"parent" => "report",
				),
				array(
					"name"   => "tarifador",
					"title"  => "Tarificador",
					"parent" => "report",
				),
				array(
					"name"  => "apps",
					"title" => "Aplicaciones"
				),
			);

		foreach($navigationApps as $navigationApp)
		{
			NavigationApp::create($navigationApp);
		}
	}

}