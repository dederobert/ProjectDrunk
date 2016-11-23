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

/**
* 
*/
class Cocktails extends Model
{
	private $file; 
	public function init()
	{
		$ddm = DrunkDataManager::getInstance();
		$this->file = $ddm->load(new File("Donnees.inc.php"), false);

	}

	public function getAll()
	{
		return $this->file->read()['Recettes'];
	}

	public function getByIngredient($ingredient)
	{
		$tmp = array();
		$recettes = $this->file->read()['Recettes']; 
		foreach ($recettes as $cocktail) {
			if (in_array($ingredient, $recettes)) {
				$tmp[] = $cocktail;
			}
		}
		return $tmp;
	}
}
 ?>