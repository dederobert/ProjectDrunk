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
	$path = str_replace('\\', DS, $class);
	if (strpos($class,'App') !== false) {
		require str_replace("App", "parts",$path).".php";
	}else{
		require  __DIR__.DS.$path . '.php';	
	}
});
 ?>