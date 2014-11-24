<?php

use aCube\Repositories\CategoryPagePermRepo;
use aCube\Entities\ApiRoute;
use aCube\Entities\CategoryApiRoutePerm;
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
	 * @param string $routeName
	 * @return void
	 */
	public function setRouteName($routeName)
	{
		$this->routeName = $routeName;
	}

	/**
	 * @param string $name
	 * @param string $uri
	 * @param string $url
	 * @param string $method
	 * @return integer
	 */
	public function getApiRouteId($name, $uri, $url, $method)
	{
		$apiRoute = ApiRoute::where('name', $name)
							->where('uri', $uri)
							->where('url', $url)
							->where('method', $method)
							->lists('id');
							
		return (empty($apiRoute) ? NULL : $apiRoute[0]);
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
	public function existsCategoryApiRoutePerms($api_route_id, $category_id)
	{
		return CategoryApiRoutePerm::where('api_route_id', $api_route_id)->where('category_id', $category_id)->count() ? true : false;
	}

	/**
     * @param integer $page_id
	 * @param integer $user_id
	 * @return boolean
	 */
	public function existsCategoryPagePerms($category_id, $page_id)
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
			$routeName = $request->path();
		}

		$page_id = $this->getPageId($routeName);

		if (is_null($page_id)) return App::abort(404);

		if(!$this->existsCategoryPagePerms(Auth::user()->category_id, $page_id)) return \App::abort(403);
	}

	/**
	 * @param Illuminate\Routing\Route $route
	 * @param Illuminate\Http\Request $request
	 * @return void
	 * @throws NotFoundHttpException
	 */
	public function api($route, $request)
	{
		$api_route_id = $this->getApiRouteId($this->routeName, $route->getUri(), $request->path(), $request->method());
		
		if (is_null($api_route_id)) return App::abort(404);

		if(!$this->existsCategoryApiRoutePerms($api_route_id, Auth::user()->category_id)) return App::abort(403);
	}

}