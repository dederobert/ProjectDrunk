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

spl_autoload_register(function($class)
{
	include  $class . '.php';
});
 ?>