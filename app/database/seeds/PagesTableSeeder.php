<?php

use aCube\Entities\Page;

class PagesTableSeeder extends Seeder {

	public function run()
	{

		/**
		 * Páginas por defecto para la aplicación.
		 */
		$pages = [
			[
				'name'   => 'dashboard',
				'uri'    => 'dashboard',
				'layout' => 'layouts.dashboard',
				'title'  => 'Dashboard',
				'description' => 'Panel de administración principal.',
				'app'    => NULL,
				'type'   => 'private',
			],
			[
				'name'   => 'app-dashboard',
				'uri'    => 'app/dashboard',
				'layout' => NULL,
				'title'  => 'Dashboard',
				'description' => 'Dashboard',
				'app'    => 'apps.dashboard.dashboard',
				'type'   => 'private',
			],
			[
				'name'   => 'login',
				'uri'    => 'login',
				'title'  => 'aCube - Login',
				'description' => '',
				'app'    => 'apps.login',
			],
			[
				'name'   => 'sign-up',
				'uri'    => 'sign-up',
				'title'  => 'aCube - Registration',
				'description' => '',
				'app'    => 'apps.sign-up',
			],
			[
				'name'   => 'forgotpassword',
				'uri'    => 'reset-password',
				'title'  => 'aCube - Forgot Password',
				'description' => '',
				'app'    => 'apps.forgotpassword',
			],
			[
				'name'   => '401',
				'uri'    => NULL,
				'title'  => 'No autorizado',
				'description' => 'Específicamente para su uso cuando la autentificación es posible pero ha fallado o aún no ha sido provista.',
				'app'    => 'errors.401',
			],
			[
				'name'   => '403',
				'uri'    => NULL,
				'title'  => 'Prohibido',
				'description' => 'La solicitud fue legal, pero el servidor se rehúsa a responderla.',
				'app'    => 'errors.403',
			],
			[
				'name'   => '404',
				'uri'    => NULL,
				'title'  => 'No encontrado',
				'description' => 'Recurso no encontrado. Se utiliza cuando el servidor web no encuentra la página o recurso solicitado.',
				'app'    => 'errors.404',
			],
			[
				'name'   => '500',
				'uri'    => NULL,
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
