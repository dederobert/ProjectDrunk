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
use App\Models\Entities\UsersEntity;
/**
* 
*/
class Users extends Model
{
	private static $salt = '$2a$07$usesomesillystringforsalt$';
	private static$userFile;

	public static function load()
	{
		if (isset($_SESSION['user'])) {
			if (isset($_SESSION['user']['username'])) {
				$ddm = DrunkDataManager::getInstance();
				self::$userFile = new File("users/".$_SESSION['user']['username'].".data", "rw");
				$ddm->load(self::$userFile, true);
				if (empty(($read=self::$userFile->read()))) {
					$_SESSION['user'] = new Users($_SESSION['user']['username'], $_SESSION['user']['pswd'], $_SESSION['user']['name'],$_SESSION['firstName']);
				}else{
					$_SESSION['user'] = unserialize($read);
				}
				return $_SESSION['user'];
			}
		}else{
			return new UsersEntity(null, null, "", "");
		}
	}

	public function connect($username, $password)
	{
		$ddm = DrunkDataManager::getInstance();
		self::$userFile = new File("users/".$username.".data", "rw");
		if (self::$userFile->exists()) {
			$ddm->load(self::$userFile, false);
			if (!empty(($read = self::$userFile->read()))) {
				$user = unserialize($read);
				if ($user->password == crypt($password,self::$salt)) {
					$_SESSION['user'] = $read;
					return $user;
				}
			}
		}
		return false;
	}

	public function register($username, $password, $lastname, $firstname, $sexe, $email, $ddn, $address, $zipcode, $city, $phone) {
		$ddm = DrunkDataManager::getInstance();
		self::$userFile = new File("users/".$username.".data", "rw");
		if (!self::$userFile->exists()){
			$password = crypt($password, self::$salt);
			$user = new UsersEntity($username, $password, $lastname, $firstname, $sexe, 
				$email, $ddn, $address, $zipcode, $city, $phone
				);
			$ddm->load(self::$userFile, true);
			$srzUser = serialize($user);
			self::$userFile->write($srzUser, true);
			$_SESSION['user'] = $srzUser;
			return $user;
		}
		return false;
	}

}
 ?>