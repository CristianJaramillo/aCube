<?php

namespace aCube\SmartUI;

use aCube\Entities\User;
use aCube\Repositories\CategoryPageRepo;

class DashboardUI {

	/**
	 * Set ribbon breadcrumbs config
	 *
	 * @var array
	 */
	protected $breadcrumbs = array();

	/**
	 * Set dashboard config
	 *
	 * @var array
	 */
	protected $dashboard_config;

	/**
	 * Set true for lock.php and login.php
	 *
	 * @var boolean
	 */
	protected $no_main_header = false;
	
	/**
	 * Optional properties for <body>
	 *
	 * @var array
	 */
	protected $page_body_prop = array();
	
	/**
	 * Optional properties for <html>
	 *
	 * @var array
	 */
	protected $page_html_prop = array();

	/**
	 * Navigation array config
	 *
	 * @var array
	 */
	protected $page_nav = array();

	/**
	 * @var aCube\Entities\User
	 */
	protected $user;

	/**
	 *
	 * @return void
	 */
	public function __construct(User $user, array $breadcrumbs = array(), $no_main_header = false)
	{
		$this->user = $user;
		$this->breadcrumbs = $breadcrumbs;
		$this->no_main_header = $no_main_header;
	}

	/**
	 * @return array
	 */
	public function getBreadcrumbs()
	{
		return $this->breadcrumbs;
	}

	/**
	 * @return array
	 */
	public function getConfig()
	{
		return $this->dashboard_config;
	}

	/**
	 * @return boolean
	 */
	public function getNoMainHeader()
	{
		return $this->no_main_header;
	}

	/**
	 * @return array
	 */
	public function getPageBodyProp()
	{
		return $this->page_body_prop;
	}

	/**
	 * @return array
	 */
	public function getPageHTMLProp()
	{
		return $this->page_body_prop;
	}

	/**
	 * @return 
	 */
	public function getPageNav()
	{
		return $this->page_nav;
	}

	/**
	 * @param string $key
	 * @param mixed $value
	 * @return void
	 */
	public function setBreadcrumb($key, $value)
	{
		$this->breadcrumbs[$key] = $value;
	}

	/**
	 * @param string $key
	 * @param mixed $value
	 * @return void
	 */
	public function setNoMainHeader(boolean $value)
	{
		$this->no_main_header = $value;
	}

	/**
	 * @param string $key
	 * @param mixed $value
	 * @return void
	 */
	public function setPageBodyProp($key, $value)
	{
		$this->page_body_prop[$key] = $value;
	}

	/**
	 * @param string $key
	 * @param mixed $value
	 * @return void
	 */
	public function setPageHTMLProp($key, $value)
	{
		$this->page_html_prop[$key] = $value;
	}

	/**
	 * @param string $key
	 * @param mixed $value
	 * @return void
	 */
	public function setPageNav($key, $value)
	{
		$this->page_nav[$key] = $value;
	}

	/**
	 * @return void
	 */
	public function setupConfig()
	{
		$this->dashboard_config = array(
				'breadcrumbs'    => $this->breadcrumbs,
				'no_main_header' => $this->no_main_header,
				'page_body_prop' => $this->page_body_prop,
				'page_html_prop' => $this->page_html_prop,
				'page_nav'       => $this->page_nav,
			);
	}

	/**
	 * @return void
	 */
	public function setupNav()
	{
		$repository = new CategoryPageRepo();
		
		$categoryPages = $repository->withWhereAndType('category_id', $this->user->category_id);

		$items = array();

		foreach ($categoryPages as $categoryPage) {
			$items[] = array(
					'title' => $categoryPage->page->title,
					'url'   => preg_replace('/\//', '', route($categoryPage->page->name, NULL, false), 1),
					'icon' => 'fa',
				);
		}

		$this->page_nav = $items;

	}

}
