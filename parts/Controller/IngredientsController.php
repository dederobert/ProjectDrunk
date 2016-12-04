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
use App\Models\Cocktails;
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

		$favCocktail = array();
		if (isset($_SESSION['user'])) {
			$cocktails = unserialize($_SESSION['user'])->cocktails;
			foreach ($cocktails as $cocktail) {
				$favCocktail[] = $cocktail->name;
			}
		}elseif (isset($_SESSION['favories'])) {
			foreach ($_SESSION['favories'] as $favorie) {
				$favCocktail[] = unserialize($favorie)->name;
			}
		}
		$this->set('favCocktail', $favCocktail);
	}
	
	public function index()
	{
		$model = new Ingredients();
		$ingredient = new Cocktails();
		$this->set("ingredients", $model->getAll());
		$this->set("cocktails", $ingredient->getByIngredient("Aliment"));
	}
	
	public function view($ingredient){
		//var_dump($ingredient);
		//$model = new Ingredients();
		//$ingredient = new Cocktails();
		$ingredient = $ingredient[0];
		$this->loadModel("Cocktails");
		$this->set("ingredients", $this->Ingredients->get($ingredient));
		$this->renderView("ingredients", 'index');
		$this->set("cocktails", $this->Cocktails->getByIngredient($ingredient));
	}
}
  ?>
