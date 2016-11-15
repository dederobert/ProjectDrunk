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
use DDM\Core\Source\File;
use DDM\DrunkDataManager;

/**
* 
*/
class Users extends Model
{
	
	private $username;
	private $pswd;
	private $name;
	private $firstName;

	private $userFile;

	function __construct($username, $pswd, $name, $firstName)
	{
		$this->username = $username;
		$this->pswd = $pswd;
		$this->name = $name;
		$this->firstName = $firstName;
	}

	public function __get($name)
	{

	}

	public function __set($name, $value)
	{
		if ($name == "username")
			$this->username = $value;
	}

	public static function load()
	{
		if (isset($_SESSION['user'])) {
			if (isset($_SESSION['user']['username'])) {
				$ddm = DrunkDataManager::getInstance();
				$this->userFile = new File("users/".$_SESSION['user']['username']."data", "rw");
				$ddm->load($this->userFile, true);
				if (empty(($read=$this->userFile->read()))) {
					$_SESSION['user'] = new Users($_SESSION['user']['username'], $_SESSION['user']['pswd'], $_SESSION['user']['name'],$_SESSION['firstName']);
				}else{
					$_SESSION['user'] = unserialize($read);
				}
				return $_SESSION['user'];
			}
		}else{
			return new Users(null, null, "", "");
		}
	}


}
 ?>