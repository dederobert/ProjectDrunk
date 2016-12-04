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
	private static $userFile;

	public static function load()
	{
		if (isset($_SESSION['user'])) {
			if (isset($_SESSION['user']['username'])) {
				$ddm = DrunkDataManager::getInstance();
				self::$userFile = new File("users/".$_SESSION['user']['username'].".data", "rw");
				$ddm->load(self::$userFile, true);
				if (empty(($read=self::$userFile->read()))) {
					$_SESSION['user'] = serialize(
						new Users($_SESSION['user']['username'], $_SESSION['user']['pswd'], $_SESSION['user']['name'],$_SESSION['firstName'])
						);
				}else{
					$_SESSION['user'] = $read;
				}
				return unserialize($read);
			}
		}else{
			return new UsersEntity(null, null, "", "");
		}
	}

	public function connect($username, $password)
	{
		// On récupère les cocktails favories en session
		$fav = array();
		if (isset($_SESSION['favories']))
			foreach ($_SESSION['favories'] as $favorie)
				$fav[] = unserialize($favorie);
	
		var_dump($fav);

		$ddm = DrunkDataManager::getInstance();
		self::$userFile = new File("users/".$username.".data", "rw");
		if (self::$userFile->exists()) {
			$ddm->load(self::$userFile, false);
			if (!empty(($read = self::$userFile->read()))) {
				$user = unserialize($read);
				if ($user->comparePassword($password)) {
					//On fusionne les favories
					$user->mergeCocktail($fav);
					$this->save($user);
					$_SESSION['user'] = serialize($user);
					unset($_SESSION['favories']);
					return $user;
				}
			}
		}
		return false;
	}

	public function register($username, $password, $lastname, $firstname, $sexe, $email, $ddn, $address, $zipcode, $city, $phone) {
		// On récupère les cocktails favories en session
		$fav = array();
		if (isset($_SESSION['favories']))
			foreach ($_SESSION['favories'] as $favorie)
				$fav[] = unserialize($favorie);

		$ddm = DrunkDataManager::getInstance();
		self::$userFile = new File("users/".$username.".data", "rw");
		if (!self::$userFile->exists()){
			$user = new UsersEntity($username, $password, $lastname, $firstname, $sexe, 
				$email, $ddn, $address, $zipcode, $city, $phone
				);
			// On ajoute les favories
			$user->mergeCocktail($fav);
			$ddm->load(self::$userFile, true);
			$srzUser = serialize($user);
			self::$userFile->write($srzUser, true);
			$_SESSION['user'] = $srzUser;
			unset($_SESSION['favories']);
			return $user;
		}
		return false;
	}

	public static function save($user) {
		$srzUser = serialize($user);
		
		if ($user->username != null) {
			$ddm = DrunkDataManager::getInstance();
			self::$userFile = new File("users/".$user->username.".data", "rw");
			self::$userFile->write($srzUser, true);
		}
		
		$_SESSION['user'] = $srzUser;
	}

	public function blankUser() {
		return new UsersEntity(null, "", "", "", "", "", "", "", "", "", "");
	}
}
 ?>