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
		$Url = $_SERVER['REQUEST_URI'];
		$chars = preg_split ( '#fr/#' , $Url, -1, PREG_SPLIT_NO_EMPTY);
		print_r($chars);
		$chars2 = explode( '/', $chars[1]);
		print_r($chars2);

	}
}
 ?>