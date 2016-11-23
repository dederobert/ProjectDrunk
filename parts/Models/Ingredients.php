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
class Ingredients extends Model
{
	private $file; 
	private $hierarchie;

	public function init()
	{
		$ddm = DrunkDataManager::getInstance();
		$this->file = $ddm->load(new File("Donnees.inc.php"), false);
		$this->hierarchie = $this->file->read()['Hierarchie'];
	}

	public function getAll()
	{
		return $this->hierarchie['Aliment'];
	}

	public function get($ingredient)
	{
		var_dump($ingredient);
		if (isset($this->hierarchie[$ingredient])) {
			return $this->hierarchie[$ingredient];
		}
		return false;
	}

	public function getHierarchie($ingredientName)
	{
		
	}

}
 ?>