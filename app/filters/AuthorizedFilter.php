<?php

use aCube\Repositories\CategoryPageRepo;
use aCube\Repositories\PageRepo;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AuthorizedFilter {
	
	/**
	 * @var string
	 */
	protected $routeName;

	/**
	 * @var string
	 */
	protected $type;

	public function __construct()
	{
		$this->routeName = Route::currentRouteName();
	}

	/**
     * @param string $uri
     * @param string $path	
	 * @return string
	 */
	public function implodeUri($path, $uri)
	{

		if ($uri != '/') $uri = '/' . $uri;

		if ($path == $uri)
		{
			return $path;
		}

		$path = preg_split("/\//", $path);
		$uri  = preg_split("/\//", $uri);

		if(count($path) == count($uri))
		{
			$lenght = count($path);
			$pattern = '/\{([a-zA-Z0-9])+\??\}/';
			$auxName = array();
			
			foreach ($uri as $key => $value) {
				$count = 0;
				$aux = preg_replace($pattern, $path[$key], $value, 1, $count);
				if ($count || count($auxName)) {
					$auxName[] = $aux;
				}
			}
			return implode('/', $auxName);
		}

		return count($path) ? implode('/', $path) : '/';
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
			$routeName = $this->implodeUri($request->getPathInfo(), $route->getUri());
		}

		if(!$this->existsCategoryPerms($this->getPageId($routeName), Auth::user()->category_id))
		{
			throw new NotFoundHttpException;
		}
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
		$pageRepo = new PageRepo();
		$page = $pageRepo->where('name', '=', $page_name);
		unset($pageRepo);
		return is_null($page) ? 0 : $page->id;
	}

	/**
     * @param integer $page_id
	 * @param integer $user_id
	 * @return boolean
	 */
	public function existsCategoryPerms($page_id, $category_id)
	{
		$categoryPageRepo = new CategoryPageRepo();

		return $categoryPageRepo->perm($page_id, $category_id);
	}

}