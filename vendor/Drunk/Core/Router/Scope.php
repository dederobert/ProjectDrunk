<?php 
/**
 * File Scope.php
 *
 * PHP version 5
 * @category Routing
 * @package Drunk\Core\Router
 * @license http://opensource.org/licenses/MIT
 * @link /
 * @since Version 0.0.1
 * @version 0.0.1
 */ 

namespace Drunk\Core\Router;

/**
* 
*/
class Scope
{
	private $vars = array();
	private $previous;

	public function __construct($previous = null)
	{
		$this->previous = $previous;
	}

	public function __set($name, $value) {
		if ($name !== "previous") {
			$this->vars[$name] = $value;
		}
	} 

	public function __get($name)
	{
		if ($name == "previous")
			return $this->previous;
		elseif ($name == "vars")
			return $this->vars;
		else
			return $this->vars[$name];
	}
}
?>