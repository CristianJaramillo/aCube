<?php

use aCube\Repositories\CategoryPagePermRepo;
use aCube\Entities\Page;

class AuthorizedFilter {
	
	/**
	 * @var string
	 */
	protected $routeName;

	public function __construct()
	{
		$this->routeName = Route::currentRouteName();
	}

	/**
	 * @param string $url
	 * @return string
	 */
	public function getUrl($url)
	{
		return $url == '/' ? $url : preg_replace("/\//", "", $url, 1);
	}

	/**
	 * @param string $routeName
	 * @return void
	 */
	public function setRouteName($routeName)
	{
		$this->routeName = $routeName;
	}

	/**
	 * @param string $page_name
	 * @return integer
	 */
	public function getPageId($page_name)
	{
		$page = Page::where('name', $page_name)->lists('id');
		return (empty($page) ? NULL : $page[0]);
	}

	/**
     * @param integer $page_id
	 * @param integer $user_id
	 * @return boolean
	 */
	public function existsCategoryPerms($page_id, $category_id)
	{
		$categoryPageRepo = new CategoryPagePermRepo();

		return $categoryPageRepo->perm($page_id, $category_id);
	}

	/**
	 * @param Illuminate\Routing\Route $route
	 * @param Illuminate\Http\Request $request
	 * @return void
	 * @throws NotFoundHttpException
	 */
	public function filter($route, $request)
	{
		$routeName = $this->routeName;

		if(is_null($routeName))
		{
			$routeName = $this->getUrl($request->getPathInfo());
		}

		if(!$this->existsCategoryPerms($this->getPageId($routeName), \Auth::user()->category_id))
		{
			return \App::abort(403);
		}
	}

}