<?php 
/**
* File UsersEntity.php
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
class UsersEntity
{
	private static $salt = '$2a$07$usofssiinorysrllgatmeselt$';
	
	private $username;
	private $pswd;
	private $lastname;
	private $firstname;
	private $sexe;
	private $email;
	private $ddn;
	private $address;
	private $zipcode;
	private $city;
	private $phone;
	private $cocktails = array();

	function __construct($username, $pswd, $lastname, $firstname, $sexe, $email, $ddn, $address, $zipcode, $city, $phone)
	{
		$this->username = $username;
		$this->password = $pswd;
		$this->lastname = $lastname;
		$this->firstname = $firstname;
		$this->sexe = $sexe;
		$this->email = $email;
		$this->ddn = $ddn;
		$this->address = $address;
		$this->zipcode = $zipcode;
		$this->city = $city;
		$this->phone = $phone;
	}

	public function __set($name, $value)
	{
		if ($name == "username")
			$this->username = $value;
		elseif ($name == "password")
			$this->pswd = crypt($value, self::$salt);
		elseif ($name == "lastname")
			$this->lastname = $value;
		elseif ($name == "firstname")
			$this->firstname = $value;
		elseif ($name == "sexe")
			$this->sexe = $value;
		elseif ($name == "email")
			$this->email = $value;
		elseif ($name == "ddn")
			$this->ddn = $value;
		elseif ($name == "address")
			$this->address = $value;
		elseif ($name == "zipcode")
			$this->zipcode = $value;
		elseif ($name == "city")
			$this->city = $value;
		elseif ($name == "phone")
			$this->phone = $value;
	}

	public function __get($name)
	{
		if ($name == "username")
			return $this->username;
		elseif ($name == "password")
			return $this->pswd;
		elseif ($name == "lastname")
			return $this->lastname;
		elseif ($name == "firstname")
			return $this->firstname;
		elseif ($name == "sexe")
			return $this->sexe;
		elseif ($name == "email")
			return $this->email;
		elseif ($name == "ddn")
			return $this->ddn;
		elseif ($name == "address")
			return $this->address;
		elseif ($name == "zipcode")
			return $this->zipcode;
		elseif ($name == "city")
			return $this->city;
		elseif ($name == "phone")
			return $this->phone;
		elseif ($name == "cocktails")
			return $this->cocktails;
	}

	public function comparePassword($password)
	{
		return $this->password == crypt($password, self::$salt);
	}

	public function add($cocktail)
	{
		if (!in_array($cocktail, $this->cocktails))
			$this->cocktails[] = $cocktail;
	}

	public function remove($cocktail)
	{
		if(in_array($cocktail, $this->cocktails))
			unset($this->cocktails[array_search($cocktail, $this->cocktails)]);
	}

	public function mergeCocktail($cocktails)
	{
		$this->cocktails = array_merge($this->cocktails, $cocktails);
	}
}
 ?>