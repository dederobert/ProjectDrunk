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
use App\Models\Entities\IngredientsEntity;
use App\Models\Cocktails;
/**
* 
*/
class Ingredients extends Model
{
	private static $file; 
	private static $hierarchie;

	

	public function init()
	{
		$ddm = DrunkDataManager::getInstance();
		self::$file = $ddm->load(new File("Donnees.inc.php"), false);
		self::$hierarchie = self::$file->read()['Hierarchie'];
	}

	public static function getAll()
	{
		$ing = new IngredientsEntity('Aliment', self::$hierarchie['Aliment']);
		$ingredients = self::getAllChild('Aliment');
		$ing->cocktails = Cocktails::getByIngredients($ingredients);
		return $ing;
	}

	public static function get($ingredient)
	{
		if (isset(self::$hierarchie[$ingredient])) {
			$ing = new IngredientsEntity($ingredient, self::$hierarchie[$ingredient]);
			$ingredients = self::getAllChild($ingredient);
			$ing->cocktails = Cocktails::getByIngredients($ingredients);
			return $ing;
		}
		return false;
	}

	public static function getHierarchie($ingredientName)
	{
	}

	public static function getAllChild($ingredientName)
	{
		$tmp = array();
		$tmp[$ingredientName] = $ingredientName;
		if (isset(self::$hierarchie[$ingredientName]['sous-categorie'])) {
			foreach (self::$hierarchie[$ingredientName]['sous-categorie'] as $ingredient) {
				$tmp = array_merge($tmp, self::getAllChild($ingredient));
			}
		}
		return $tmp;
	}
	
}
 ?>