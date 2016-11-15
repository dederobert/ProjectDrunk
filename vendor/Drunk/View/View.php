<?php
namespace Drunk\View;

use Drunk\Exception\FileException;
use Drunk\Core\Router\Scope;

class View {
	
	private $viewPath;
	private $layoutPath;

	public function __construct($layoutPath = PARTS_PATH.DS."Template".DS."layout".DS."default.php")
	{
		$this->layoutPath = $layoutPath;
	}

	public function __set($name, $value)
	{
		if ($name === "view") 
			$this->viewPath = $value;
		elseif ($name === "layout") 
			$this->layoutPath = $value;
	}

	public function __get($name)
	{
		if ($name === "ready")
			return $this->viewPath != null && $this->layout != null;
		elseif ($name === "view")
			return $this->viewPath;
		elseif ($name === "layout")
			return $this->layoutPath;
	}

	public function load($scope, $bread = null)
	{
		while ($scope != null) {
			foreach ($scope->vars as $var => $value) {
				${$var} = $value;
			}
			$scope = $scope->previous;
		}
		$breadcrumb = $bread;
		$viewPath = $this->viewPath; 

		if (file_exists($this->layoutPath)) {
			if (file_exists($this->viewPath)){
				include $this->layoutPath;
			}else{
				throw new FileException("The template file ".$this->viewPath." not found", 404);
			}
		}else{
			throw new FileException('The layout file '.$this->layoutPath.' not found',404);
		}
	}

}

/*
* HELPERS
*/

/**
* Create a URL
* 
* @param $uri array
*	- controller
*	- action
*	- params array
*/
function URL($uri = array())
{
	return "";	
}

?>