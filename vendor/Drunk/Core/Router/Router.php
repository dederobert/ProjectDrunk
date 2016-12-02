<?php
namespace Drunk\Core\Router;
use Drunk\Core\Router\Request;
use Drunk\Exception\Exception;
use Drunk\Exception\FileException;

/**
* 
*/
class Router{
	
	public $controllerName;
	public $actionName;
	public $params = array();

	public function __construct($nomControler = null, $nomAction = null, $tableauParam=array()){
		
		if (!is_null($tableauParam)&&!is_array($tableauParam)) 
			throw new Exception("Les parametres doivent être un tableau");

		$this->controllerName = ucfirst($nomControler)."Controller";
		$this->actionName= $nomAction;
		$this->params = $tableauParam;
	}	

	public function __get($property)
	{
		if ($property === "controllerFile") {
			return PARTS_PATH.DS."Controller".DS.$this->controllerName.".php";
		}else if($property === "controllerName") {
			return $this->controllerName;
		}else if($property === "controller") {
			return str_replace("Controller", "", $this->controllerName);
		}
	}

	public function route()
	{
		if (file_exists($this->controllerFile)) {
			if (class_exists('App\\Controller\\'.$this->controllerName,true)) {
				$nsp_ctrl_name = 'App\\Controller\\'.$this->controllerName;
				//On récupère le scope de la redirection précedante
				$previous_scp = (isset($controller)?$controller->scope:null);
				$controller = new $nsp_ctrl_name(new Scope($previous_scp), $this->controllerName, $this->actionName, $this->params);
				if (method_exists($controller, $this->actionName)) {
					$action_name = $this->actionName;
					$controller->$action_name($this->params);
				}else{
					throw new Exception("The method ".$this->actionName." not found",404);
				}
			}else {
				throw new Exception("The controller class ".$this->controllerName." not found",404);
			}
		}else{
			throw new FileException("Controller file ".$this->controllerFile." not found");
		}
		return $controller;
	}
}
?>
