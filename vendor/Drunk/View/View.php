<?php
namespace Drunk\View;

use Drunk\Exception\FileException;
use Drunk\Core\Router\Scope;

/**
*
*/
class View {
	
	private $viewPath;
	private $layoutPath;
	private $helpers = ['URL', 'css', 'script', 'img'];

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

	private function _loadHelper($name)
	{
		$filename = join(DS, array(ROOT, 'vendor', 'Drunk', 'View', 'Helper', $name.'Helper.php'));
		if (file_exists($filename)) {
			include_once $filename;
		}else{
			throw new FileException("The request helper ".$filename." not found", 404);
		}
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
				foreach ($this->helpers as $helper) {
					$this->_loadHelper($helper);
				}
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