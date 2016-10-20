<?php 
/**
 * File Request.php
 *
 * PHP version 7
 * @category 
 * @package 
 * @license http://opensource.org/licenses/MIT
 * @link /
 * @since Version 0.0.1
 * @version 0.0.1
 */ 

namespace Drunk\Core\Router;
/**
* 
*/
class Request
{
	public $vars = array();

	public function __set($name, $value) {
		$vars[$name] = $value;
	} 
}
?>