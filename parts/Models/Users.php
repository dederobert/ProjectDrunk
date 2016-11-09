<?php 
/**
* File Users.php
*
* PHP version 7
* @category Model
* @package App\Models
* @license http://opensource.org/licenses/MIT
* @link /
* @since Version 0.0.1
* @version 0.0.1
*/
namespace App\Models;

use Drunk\Model\Model;

/**
* 
*/
class Users extends Model
{
	
	public $username;
	public $pswd;
	public $name;
	public $firstName;

	function __construct($username, $pswd, $name, $firstName)
	{
		$this->username = $username;
		$this->pswd = $pswd;
		$this->name = $name;
		$this->firstName = $firstName;
	}
}
 ?>