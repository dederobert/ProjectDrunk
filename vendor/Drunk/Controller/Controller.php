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
	private $params = array();
	private $scope = null;
	private $breadState;
	private $breadcrumb = array();
	private $breadKey;

	private $models = array();

	/**
	* @param $scope Scope
	* @param $name String
	* @param $callAction String
	* @param $breadState int -1: no breadcrumb, 0: head of breadcrumb, 1: child in breadcrumb
	*/
	public function __construct($scope, $name, $callAction = "index", $params = array(), $breadState = -1) {
		$this->breadState = $breadState;
		$this->scope = $scope;
		$this->name = str_replace("Controller", "", $name);
		$this->callAction = $callAction;
		$this->params = $params;
		
		$this->breadKey = $this->name;
		$this->loadModel($this->name);
		$this->preInit();
		$this->init();
	}

	public function preInit() {}

	/**
	* Call after preInit
	* set the breacrumps
	*/
	public function init() {
		if ($this->breadState <= 0 ) unset($_SESSION['breadcrumb']);
		if ($this->breadState >= 0) {
			// Recupère le tableau en session
			$this->breadcrumb = isset($_SESSION['breadcrumb'])?$_SESSION['breadcrumb']:[];
			if (($posKey = $this->hasBread($this->breadKey)) === false) {
				$i = count($this->breadcrumb);
				$this->breadcrumb[$i]['title'] = $this->breadKey;
				$this->breadcrumb[$i]['url'] = $_SERVER['REQUEST_URI'];
			}else{
				$this->breadcrumb = array_splice($this->breadcrumb,0, $posKey+1);
			}

			//$posKey = array_search($this->breadKey, array_keys($this->breadcrumb))+1;
			//
			$_SESSION['breadcrumb'] = $this->breadcrumb;
		}
	}

	private function hasBread($name) {
		$i = 0;
		foreach ($this->breadcrumb as $breadcrumb) {
			if ($breadcrumb['title'] == $name) return $i;
			$i++;
		}
		return false;
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

	public function __set($name, $value)
	{
		if ($name === "bread") 
			$this->breadState = $value;
		elseif ($name === "breadKey")
			$this->breadKey = $value;
	}

	public function __get($name)
	{
		if ($name === "scope")
			return $this->scope;
		elseif ($name == "name")
			return $this->name;
		elseif ($name == "callAction")
			return $this->callAction;
		elseif ($name == "params")
			return $this->params;
		elseif ($name === "breadcrumb")
			return $this->breadcrumb;
		elseif ($name === "parent") {
			end($this->breadcrumb);
			$tmp = prev($this->breadcrumb);
			reset($this->breadcrumb);
			return $tmp;
		}
	}

	public function set($name, $value)
	{
		$this->scope->$name = $value;
	}

	protected function renderView($folderName, $viewName)
	{
		Drunk::loadRender($folderName, $viewName);
	}

	protected function renderLayout($layoutName)
	{
		Drunk::loadLayout("layout", $layoutName);
	}

	protected function loadModel($modelName)
	{
		if (file_exists(PARTS_PATH.DS."Model".DS.$modelName.".php")) {
			$nsp_model = "App\\Models\\".$modelName;
			if (class_exists($nsp_model, true)) $this->models[] = new $nsp_model();
		}
	}
}
 ?>