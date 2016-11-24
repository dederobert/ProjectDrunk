<?php 
/**
 * File Ingredient.php
 *
 * PHP version 7
 * @category Entities
 * @package Entities
 * @license http://opensource.org/licenses/MIT
 * @link /
 * @since Version 0.0.1
 * @version 0.0.1
 */

namespace App\Models\Entities;

/**
* 
*/
class IngredientsEntity
{
	private $dirty = false;
	private $name;
	private $superCategorie = array();
	private $sousCategorie = array();
	private $cocktails = array();

	public function __construct($name, $ingredient = array())
	{
		$this->name = $name;
		if (isset($ingredient['super-categorie']))			
			$this->superCategorie = $ingredient['super-categorie'];
		if (isset($ingredient['sous-categorie']))
			$this->sousCategorie = $ingredient['sous-categorie'];
	}

	public function __get($name)
	{
		if ($name == "name") 
			return $this->name;	
		elseif ($name == "sousCategorie")
			return $this->sousCategorie;
		elseif ($name == "superCategorie")
			return $this->superCategorie;
		elseif ($name == "hasSousCategorie")
			return !empty($this->sousCategorie);
		elseif ($name == "cocktails")
			return $this->cocktails;
	}

	public function __set($name, $value)
	{
		if ($name == "cocktails") {
			$this->dirty = true;
			$this->cocktails = $value;
		}
	}

}
  ?>