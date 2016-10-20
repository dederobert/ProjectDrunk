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
use Drunk\Core\Router\Router;

namespace Drunk\Core;
/**
* 
*/
class Drunk
{
	public static function start()
	{
		var_dump($_SERVER['REQUEST_URI']);
		
	}
}
 ?>