<?php
namespace Drunk\Core\Router;
use Drunk\Exception\Exception;
use Drunk\Core\Router\Request;

/**
* 
*/
class Router{
	
	public $controllerName;
	public $actionName;
	public $params = array();

	public function __construct($nomControler = null, $nomAction = null, $tableauParam=null){
		
		if (!is_null($tableauParam)&&!is_array($tableauParam)) 
			throw new Exception("Les parametres doivent être un tableau");

		$this->controllerName = $nomControler."Controller";
		$this->actionName= $nomAction;
		$this->params = $tableauParam;
	}	

	public function __get($property)
	{
		if ($property === "controllerFile") {
			return PARTS_PATH.DS."Controller".DS.$this->controllerName.".php";
		}else if($property === "controllerName") {
			return $this->controllerName;
		}
	}
}
?>