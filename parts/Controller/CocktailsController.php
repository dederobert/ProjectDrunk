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
use App\Models\Cocktails;
/**
* 
*/
class CocktailsController extends Controller
{

	public function preInit() {
		parent::preInit();
		$this->bread = 0;
	}
	
	public function index()
	{
		$model = new Cocktails();
		$this->set("cocktails", $model->getAll());
	}
}
  ?>