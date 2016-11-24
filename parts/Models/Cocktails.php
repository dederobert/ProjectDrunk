<?php 
/**
* File Cocktails.php
*
* PHP version 7
* @category Model
* @package Models
* @license http://opensource.org/licenses/MIT
* @link /
* @since Version 0.0.1
* @version 0.0.1
*/
namespace App\Models;

use Drunk\Model\Model;
use DDM\DrunkDataManager;
use DDM\Core\Source\File;
use App\Models\Entities\CocktailsEntity;

/**
* 
*/
class Cocktails extends Model
{
	private static $file; 
	public  function init()
	{
		$ddm = DrunkDataManager::getInstance();
		self::$file = $ddm->load(new File("Donnees.inc.php"), false);

	}

	public static function getAll()
	{
		return self::$file->read()['Recettes'];
	}

	public static function getByIngredient($ingredient)
	{

		$tmp = array();
		$recettes = self::$file->read()['Recettes']; 
		foreach ($recettes as $cocktail) {
			if (in_array($ingredient, $cocktail['index'])) {
				$tmp[] = new CocktailsEntity($cocktail['titre'], $cocktail);
			}
		}
		return $tmp;
	}

	public static function getByIngredients($ingredients)
	{
		$tmp = array();
		foreach ($ingredients as $ingredient) {
			$cocktails = self::getByIngredient($ingredient);
			foreach ($cocktails as $cocktail) {
				$tmp[$cocktail->name] = $cocktail;
			}
		}
		return $tmp;
	}
}
 ?>