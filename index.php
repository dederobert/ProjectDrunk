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
require join(DIRECTORY_SEPARATOR, array(__DIR__, 'vendor', 'autoload.php'));

Drunk\Core\Drunk::start();
?>