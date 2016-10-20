<?php
use Drunk\Exception\Exception;
use Drunk\Core\Router\Request;

namespace Drunk\Core\Router;
class Router{
	
	public $controllerName;
	public $actionName;
	public $params = array();

	public function __construct($nomControler = null, $nomAction = null, $tableauParam=null){
		if (!is_null($tableauParam)&&!is_numeric($tableauParam)) 
			throw new Exception("Les parametres doivent être un tableau");

		$this->controllerName = $nomControler;
		$this->nomAction = $nomAction;
		$this->params = $tableauParam;
	}	

	public function route()
	{
		
	}
}
?>