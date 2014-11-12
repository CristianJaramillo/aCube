<?php

use aCube\Linfo\Linfo;
use aCube\SmartUI\DashboardUI;

class DashboardController extends BaseController {

	/**
	 * GET app/{name}
	 * 
	 * @param $name
	 * @return \View
	 * @throws \Symfony\Component\HttpKernel\Exception\HttpException
	 */
	public function app($app = 'app-dashboard')
	{
		// Obtención de objeto page y agregado a params.
		$this->setupApp($app);
		$this->setupDashboard();
		return parent::index();
	}

	/**
	 * @return void
	 */
	public function setupDashboard()
	{
		$linfo = new Linfo();
	    $this->addParam([
			'core' => $linfo->core,
			'device' => $linfo->device,
			'memory' => $linfo->memory,
			'memorySystem' => $linfo->memorySystem,
			'network' => $linfo->network,	    	
	    ]);
	    unset($linfo);
	}

	/**
	 * GET dashboard
	 *
	 * @return \view
	 */
	public function index()
	{
		// Obtención de objeto page y agregado a params.
		$this->setupPage();

		// Nueva instancia DashboardUI
		$dashboard = new DashboardUI(Auth::user());

		// Añadimos la clase por default
		$dashboard->setPageBodyProp('class', 'smart-style-1 fixed-navigation fixed-header fixed-ribbon');

		// Genaramos la estructura del menu de navegación
		$dashboard->setupNav();

		// Generamos la configuración.
		$dashboard->setupConfig();

		// Añadimos las configuraciones del dashboard.
		$this->addParam($dashboard->getConfig());

		// Parametros globales por enviar a la vista.
		// dd($this->params);

		return parent::index();
	}

}