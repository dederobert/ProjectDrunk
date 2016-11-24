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

/**
* 
*/
class CocktailsController extends Controller
{

	public function preInit() {
		parent::preInit();
		$this->bread = 0;
	}
	
	
	public function view($cocktail) {
		//affiche le detail du cocktail $cocktail
	}
	
	public function favorite($cocktail) {
		$this->renderLayout('ajax');
		// Enregistrer le favorie
	}
	
	public function unfavorite($cocktail) {
		$this->renderLayout('ajax');
		$this->renderView('cocktails', 'favorite');
		// Desenregistrer le favorie
	}
}
  ?>