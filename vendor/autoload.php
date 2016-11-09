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


spl_autoload_register(function($class)
{
	if (strpos($class,'App') !== false) {
		include str_replace("App", "parts",$class).".php";
		//echo $class;
		//include $class.".php";
	}else{
		include  __DIR__.DS.$class . '.php';	
	}
});
 ?>