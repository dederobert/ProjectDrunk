<?php 
/**
 * File CocktailsEntity.php
 *
 * PHP version 7
 * @category Entity
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
class CocktailsEntity
{
	private $name;
	private $ingredients;
	private $preparation;
	private $tags = array();
	
	function __construct($name, $cocktail = array())
	{
		$this->name = $name;
		if (isset($cocktail['ingredients']))
			$this->ingredients = $cocktail['ingredients'];
		if (isset($cocktail['preparation']))
			$this->preparation = $cocktail['preparation'];
		if (isset($cocktail['index']))
			$this->tags = $cocktail['index'];
	}

	public function __get($name)
	{
		if ($name == "name")
			return $this->name;
		elseif ($name == "ingredients")
			return $this->ingredients;
		elseif ($name == "preparation")
			return $this->preparation;
		elseif ($name == "tags") 
			return $this->tags;
	}
}
  ?>