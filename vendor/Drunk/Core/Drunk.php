<?php 
/**
* File Drunk.php
*
* PHP version 
* @category Core
* @package Core
* @link /
* @since Version 0.0.1
* @version 0.0.1
*/
namespace Drunk\Core;


use Drunk\Core\Router\Router;
use Drunk\Exception\Exception;
use Drunk\Exception\URIException;
use Drunk\Exception\FileException;

/**
* Main class project
*/
class Drunk
{
	/**
	* Main project function, it call on project start and route the user with the request URI
	*/ 
	
	private static $router;
	private static $needRoute = true;
	
	public static function start()
	{
		$Url = $_SERVER['REQUEST_URI'];
		if (strpos($Url, 'fr') === false) throw new URIException("The request URI have to contains the local name ! ex: drunk/fr/...");
		$chars = preg_split ( '#fr/#' , $Url, -1, PREG_SPLIT_NO_EMPTY);
		$chars2 = explode( '/', $chars[1]);
		
		Drunk::$router = new Router($chars2[0],$chars2[1],array_splice($chars2, 2, count($chars2)));
		Drunk::route();
	}
	
	public static function route() {
		while(Drunk::$needRoute) {
			Drunk::$needRoute = false;
			if (file_exists(Drunk::$router->controllerFile)) {
				 include Drunk::$router->controllerFile;
				if (class_exists('App\\Controller\\'.Drunk::$router->controllerName,false)) {
					$nsp_ctrl_name = 'App\\Controller\\'.Drunk::$router->controllerName;
					$controller = new $nsp_ctrl_name();
					if (method_exists($controller, Drunk::$router->actionName)) {
						$action_name = Drunk::$router->actionName;
						$controller->$action_name(...Drunk::$router->params);
					}else{
						throw new Exception("The method ".Drunk::$router->actionName." not found",404);
					}
				}else {
					throw new Exception("The controller class ".Drunk::$router->controllerName." not found",404);
				}
			}else{
				throw new FileException("Controller file ".Drunk::$router->controllerFile." not found");
			}
		}
	}
	
	public static function needRoute($router) {
		Drunk::$router = $router;
		Drunk::$needRoute = true;
	}
}
 ?>