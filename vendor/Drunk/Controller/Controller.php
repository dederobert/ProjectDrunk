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
use Drunk\Exception\URIException;

class Controller
{
	
	public function __construct() {
	}

	/**
	* Redirect the user on other action/controller
	* @param $route Array:
	*		- controller: The controller namespace
	* 		- action: The action namespace
	* 		- params array: the params
	*/
	private function redirect(array $route) {
		if (!isset($route['controller']) && !isset($route['action'])) throw new URIException("The given route isn't in valid format"); 
		Drunk::needRoute(new Router($route['controller'], $route['action'], $proute['params']));
	}

}
 ?>