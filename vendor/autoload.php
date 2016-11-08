<?php 
/**
* File autoload.php
*
* PHP version 5
* @category Autoload
* @package Drunk
* @link /
* @since Version 0.0.1
* @version 0.0.1
*/
define('DS', DIRECTORY_SEPARATOR);
define('CONF_PATH', join(DS, array(dirname(__DIR__), 'config')));

include CONF_PATH.DS."config.php";

spl_autoload_register(function($class)
{
	if (strpos($class,'App') !== false) {
		str_replace("App", "..".DS."parts",$class);
		include $class.".php";
	}else{
		include  __DIR__.DS.$class . '.php';		
	}
});
 ?>