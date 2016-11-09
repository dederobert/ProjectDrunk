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
include CONF_PATH.DS."config.php";

// Inclusion de l'autoload
require join(DIRECTORY_SEPARATOR, array(__DIR__, 'vendor', 'autoload.php'));

use DDM\DrunkDataManager;
use DDM\Core\Source\File;
use Drunk\Exception\FileException;
use Drunk\Core\Drunk;
use Drunk\Core\Router\Router;

// TODO Temporaire
use App\Models\Users;
$user;
// Fin temporaire

// Demarrage de drunk
Drunk::start(@$_GET['req']);

try{
	$ddm = DrunkDataManager::getInstance();
	$ddm->load(new File("Donnees.inc.php"), false);
	//if (isset($_SESSION['user'])) {
		$userFile = new File("users/dinquer1u", "rw");
		$ddm->load($userFile, true);
		$user = unserialize($userFile->read());
	//}else{
	//	$user = new Users("dinquer1u", "mm", "Dinquer", "Alexis");
	//}
		var_dump($user);

	
	Drunk::run();
	//if (isset($_SESSION['user'])) {
		$userFile->write(serialize($user));
	//}
}catch(Exception $e){
	Drunk::run(new Router("error", "e".$e->getCode(), [$e]));
}
?>