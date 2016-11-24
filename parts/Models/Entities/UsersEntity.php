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
	private $username;
	private $pswd;
	private $lastname;
	private $firstName;
	private $sexe;
	private $email;
	private $ddn;
	private $address;
	private $zipcode;
	private $city;
	private $phone;
	private $cocktails = array();

	function __construct($username, $pswd, $lastname, $firstName, $sexe, $email, $ddn, $address, $zipcode, $city, $phone)
	{
		$this->username = $username;
		$this->pswd = $pswd;
		$this->lastname = $lastname;
		$this->firstName = $firstName;
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
	}

	public function __get($name)
	{
		if ($name == "username")
			return $this->username;
		elseif ($name == "password")
			return $this->pswd;
	}
}
 ?>