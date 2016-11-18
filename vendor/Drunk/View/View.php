<?php
namespace Drunk\View;

use Drunk\Exception\FileException;
use Drunk\Core\Router\Scope;
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
	$tmp = !isset($uri['params'])?$uri['params']:[];
	if (isset($uri['controller'])) {
		if (isset($uri['action'])) {
			return join(DS ,array(BASE_URL, $uri['controller'], $uri['action'], ...$tmp));	
		}else {
			return join(DS ,array(BASE_URL, $uri['controller'], 'index', ...$tmp));
		}
	}
}

/**
* Return the path of given image name if exist
* 
* @return The path of image
* @throws FileException, if the given file doesn't exist
*/
function img($name) {
	if (file_exists(join(DS, array(WWW, "imgs", $name)))) {
		return WWW."/imgs/".$name;
	}else{
		throw new FileException("Image file ".$name." not found", 404);
	}
}

/**
*
*/
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
?>