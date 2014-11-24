<?php

use aCube\SmartUI\Dashboard;

class DashboardController extends BaseController {

	/**
	 * GET app/{name}
	 * 
	 * @param $name
	 * @return \View
	 */
	public function app()
	{
		$this->layout = 'apps.dashboard.dashboard';
		return $this->index();
	}

	/**
	 * GET dashboard
	 *
	 * @return \view
	 */
	public function show()
	{
		// Obtención de objeto page y agregado a params.
		$this->setupPage();

		// Nueva instancia DashboardUI
		$dashboard = new Dashboard(Auth::user());

		// Añadimos la clase por default
		$dashboard->setPageBodyProp('class', 'smart-style-1 fixed-navigation fixed-header fixed-ribbon');

		// Genaramos la estructura del menu de navegación
		$dashboard->setupNav();

		// Añadimos las configuraciones del dashboard.
		$this->addParam($dashboard->getAllConfig());

		// Parametros globales por enviar a la vista.
		// dd($this->params);

		return $this->index();
	}

}