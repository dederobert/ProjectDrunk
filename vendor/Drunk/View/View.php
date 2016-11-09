<?php
namespace Drunk\View;

use Drunk\Exception\FileException;
use Drunk\Core\Router\Scope;

class View {
	
	private $viewPath;

	public function __construct($viewPath)
	{
		$this->viewPath = $viewPath;
	}

	public function load($scope)
	{
		while ($scope != null) {
			foreach ($scope->vars as $var => $value) {
				${$var} = $value;
			}
			$scope = $scope->previous;
		}

		if (file_exists($this->viewPath)) {
			include $this->viewPath;	
		}else{
			throw new FileException('The template file '.$this->viewPath.' not found',404);
		}
	}
}
?>