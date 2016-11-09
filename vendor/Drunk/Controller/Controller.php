<?php 
/**
* File Controller.php
*
* PHP version 7
* @category Controller
* @package Controller
* @since Version 0.0.1
* @version 0.0.1
*/

namespace Drunk\Controller;
use Drunk\Core\Drunk;
use Drunk\Core\Router\Router;
use Drunk\Exception\URIException;

class Controller
{
	
	private $name;
	private $callAction;
	private $scope = null;

	public function __construct($scope, $name, $callAction = "index") {
		$this->scope = $scope;
		$this->name = str_replace("Controller", "", $name);
		$this->callAction = $callAction;
	}

	/**
	* Redirect the user on other action/controller
	* @param $route Array:
	*		- controller: The controller namespace
	* 		- action: The action namespace
	* 		- params array: the params
	*/
	protected function redirect(array $route) {
		if (!isset($route['controller']) && !isset($route['action'])) throw new URIException("The given route isn't in valid format"); 
		$route += ['controller'=>'', 'action'=> '', 'params' => []];
		Drunk::needRoute(new Router($route['controller'], $route['action'], $route['params']));
	}

	public function __get($name)
	{
		if ($name === "scope")
			return $this->scope;
		elseif ($name == "name")
			return $this->name;
		elseif ($name == "callAction")
			return $this->callAction;
	}

	public function set($name, $value)
	{
		$this->scope->$name = $value;
	}

	public function renderView($folderName, $viewName)
	{
		Drunk::render($folderName, $viewName);
	}

	public function renderLayout($layoutName)
	{
		# code...
	}

}
 ?>