<?php 
/**
 * File CocktailController.php
 *
 * PHP version 7
 * @category Controller
 * @package Controller
 * @license http://opensource.org/licenses/MIT
 * @link /
 * @since Version 0.0.1
 * @version 0.0.1
 */
namespace App\Controller;

use Drunk\Controller\Controller;

//TEMP
use App\Models\Ingredients;
/**
* 
*/
class IngredientsController extends Controller
{

	public function preInit() {
		parent::preInit();
		if($this->callAction === 'view')
			$this->bread = 1;
		else
			$this->bread = 0;
		
		$this->breadKey = isset($this->params[0])?$this->params[0]:"Aliment";
	}
	
	public function index()
	{
		$model = new Ingredients();
		$this->set("ingredients", $model->getAll());
	}
	
	public function view($ingredient){
		$model = new Ingredients();
		$this->set("ingredients", $model->get($ingredient));
		$this->renderView("ingredients", 'index');
	}
}
  ?>