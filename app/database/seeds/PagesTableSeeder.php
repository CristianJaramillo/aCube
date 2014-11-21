<?php

use aCube\Entities\Page;

class PagesTableSeeder extends Seeder {

	public function run()
	{
		$pages = [
			[
				'name'   => 'dashboard',
				'layout' => 'layouts.dashboard',
				'title'  => 'Dashboard',
				'description' => 'Panel de administración principal.',
				'app'    => NULL,
				'type'   => 'private',
			],
			[
				'name'   => 'login',
				'title'  => 'aCube - Login',
				'description' => '',
				'app'    => 'apps.login',
			],
			[
				'name'   => 'sign-up',
				'title'  => 'aCube - Registration',
				'description' => '',
				'app'    => 'apps.sign-up',
			],
			[
				'name'   => 'forgotpassword',
				'title'  => 'aCube - Forgot Password',
				'description' => '',
				'app'    => 'apps.forgotpassword',
			],
			[
				'name'   => '401',
				'title'  => 'No autorizado',
				'description' => 'Específicamente para su uso cuando la autentificación es posible pero ha fallado o aún no ha sido provista.',
				'app'    => 'errors.401',
			],
			[
				'name'   => '403',
				'title'  => 'Prohibido',
				'description' => 'La solicitud fue legal, pero el servidor se rehúsa a responderla.',
				'app'    => 'errors.403',
			],
			[
				'name'   => '404',
				'title'  => 'No encontrado',
				'description' => 'Recurso no encontrado. Se utiliza cuando el servidor web no encuentra la página o recurso solicitado.',
				'app'    => 'errors.404',
			],
			[
				'name'   => '500',
				'title'  => 'Error interno',
				'description' => 'Es un código comúnmente emitido cuando se encuentran con situaciones de error ajenas a la naturaleza del servidor web',
				'app'    => 'errors.500',
			],
		];

		foreach ($pages as $page) {
			Page::create($page);
		}
	}

}
