<?php

class DataTableController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /datatable
	 *
	 * @return Response
	 */
	public function app()
	{
		$this->layout = 'apps.datatable.datatable-users';
		return $this->index();
	}

}