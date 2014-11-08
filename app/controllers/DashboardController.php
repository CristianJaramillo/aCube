<?php

use aCube\SmartUI\DashboardUI;

class DashboardController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Dashboard Controller
	|--------------------------------------------------------------------------
	|
	|	Route::get('{url}', 'DashboardController@index');
	|
	*/

	/**
	 * @var array $breadcrumbs
	 */
	protected $breadcrumbs = array();

	/**
	 * @var boolean $main_header
	 */
	protected $main_header = true;

	/**
	 * @var array 
	 */
	protected $page_nav = array(
							"Dashboard" => array(
								"title" => "Dashboard",
								"url" => "ajax/jqgrid-extensions",
								"icon" => "fa-home"
							),
						);

	/**
	 * POST ajax/{app}
	 *
	 * @param string $app
	 * @return \View
	 */
	public function ajax($app)
	{
		$page = new aCube\Repositories\PageRepo();
		// Falta validar que el usuario tenga acceso a este contenido.
		$page = $page->current($app, 'private');

		if(is_null($page)) throw new Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
		
		$this->addParam(array(
					'title' => $page->title,
				));

		$this->layout = $page->app;

		return $this->index();

	}

	/**
	 * GET dashboard
	 *
	 * @return \view
	 */
	public function index()
	{
		// Obtención de pagina desde base de datos.
		// $this->setupPage();

		// Nueva instancia DashboardUI
		$dashboard = new DashboardUI(Auth::user());

		// Añadimos la configuración de dashboard.
		$this->addParam($dashboard->getConfig());

		echo page_prop($dashboard->getPageBodyProp());

		// Parametros globales por enviar a la vista.
		dd($this->params);

		// return parent::index();
	}

}