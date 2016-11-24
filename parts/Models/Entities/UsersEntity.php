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
/**
* 
*/
class UsersEntity
{
	private $username;
	private $pswd;
	private $name;
	private $firstName;

	function __construct($username, $pswd, $name, $firstName)
	{
		$this->username = $username;
		$this->pswd = $pswd;
		$this->name = $name;
		$this->firstName = $firstName;
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