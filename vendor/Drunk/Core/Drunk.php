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
use Drunk\Core\Router\Scope;
use Drunk\View\View;
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
	private static $view = null;
	private static $needRoute = true;
	
	public static function start($request)
	{
		if ($request != null) {
			$chars2 = explode( '/', $request);
			Drunk::$router = new Router($chars2[0],$chars2[1],array_splice($chars2, 2, count($chars2)));
		}else {
			Drunk::$router = new Router("pages","view",["home"]);
		}
	}
	
	/**
	* Route the user
	* @param Router $router The route 
	*/
	public static function run($router = null) {
		//On reset les variables
		Drunk::$view = null;
		$max_redirection = 5;
		if ($router == null) {$router = Drunk::$router;}
		
		if (DEBUG!==0) {ob_start();}
		// On route tant qu'il le faut
		do {
			Drunk::$needRoute = false;
			$controller = $router->route();
			$max_redirection--;
			$router = Drunk::$router;
		} while(Drunk::$needRoute && $max_redirection > 0);
		if (DEBUG!==0) {ob_end_clean();}

		if ($max_redirection == 0 && Drunk::$needRoute) {throw new Exception("The redirection system create an infinite loop", 500);}

		if (Drunk::$view == null) {
			Drunk::$view = new View(join(DS,array(PARTS_PATH,"Template",$controller->name,$controller->callAction.".php")));
		}
		Drunk::$view->load($controller->scope);
	}
	
	public static function render($folderName,$viewName)
	{
		Drunk::$view = new View(join(DS,array(PARTS_PATH,"Template",$folderName,$viewName.".php")));
	}

	public static function needRoute($router) {
		Drunk::$router = $router;
		Drunk::$needRoute = true;
	}
}
 ?>