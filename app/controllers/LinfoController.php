<?php

use Linfo\Linfo;

class LinfoController extends \BaseController {

	/**
	 * @var \Linfo
	 */
	protected $Linfo;

	/**
	 * @return void
	 */
	public function __construct(Linfo $Linfo)
	{
		$this->Linfo = $Linfo;
		$this->layout = 'apps.dashboard.widgets.linfo.';
	}

	/**
	 * Display a listing of the resource.
	 * GET /linfo/core/widget/
	 * POST /linfo/core/json/
	 *
	 * @return Response
	 */
	public function getCore($type)
	{
		if($type == 'json')
		{
			$this->Linfo->setupCore();
			return \Response::json($this->Linfo->getCore());
		} elseif ($type == 'widget') {
			$this->Linfo->setupCore();
			$this->addParam('core', $this->Linfo->getCore());
			$this->layout .= 'core';
			return $this->index();
		}
	}

}