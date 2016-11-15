<?php 
/**
* File Breadcrumpb.php
*
* PHP version 7
* @category Scope
* @package Router
* @license http://opensource.org/licenses/MIT
* @link /
* @since Version 0.0.1
* @version 0.0.1
*/
namespace Drunk\Core\Router;

/**
* 
*/
class Breadcrumb
{
	private $previous;
	private $URL;
	private $title;

	function __construct($title, $previous = null)
	{
		$this->title = $title;
		$this->URL = $_SERVER['REQUEST_URI'];
		$this->previous = $previous;
	}

	public function __set($name, $value)
	{
		if ($name === "title")
			$this->title = $value;
	}

	public function __get($name)
	{
		if ($name === "URL")
			return $this->URL;
		elseif ($name === "title")
			return $this->title;
	}

	public function pop()
	{

		return $this->previous;
	}

	public static function popAll($head)
	{
		$all = array();
		while($head != null){
			$all[$head->title] = $head;
			$head = $head->pop(); 
		}
		return array_reverse($all);
	}
}
 ?>