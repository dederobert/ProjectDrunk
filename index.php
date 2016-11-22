<?php 
/**
 * File index.php
 *
 * PHP version 5
 * @category www
 * @package Root
 * @link /
 * @since Version 0.0.1
 * @version 0.0.1
 */ 
session_start();
// Definition des constantes
define('DS', DIRECTORY_SEPARATOR);
define('CONF_PATH', join(DS, array(__DIR__, 'config')));
define('BASE_URL', $_SERVER['REDIRECT_BASE']);//substr(__DIR__, strrpos(__DIR__, '\\', -strlen(dirname(__DIR__)))));
include CONF_PATH.DS."config.php";

// Inclusion de l'autoload
require join(DIRECTORY_SEPARATOR, array(__DIR__, 'vendor', 'autoload.php'));

use Drunk\Exception\FileException;
use Drunk\Core\Drunk;
use Drunk\Core\Router\Router;
// Demarrage de drunk
Drunk::start(@$_GET['req']);

try{
	Drunk::run();
}catch(Exception $e){
	Drunk::run(new Router("error", "e".$e->getCode(), array($e)));
}
?>