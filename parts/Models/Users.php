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
	


	private static$userFile;

	

	public static function load()
	{
		if (isset($_SESSION['user'])) {
			if (isset($_SESSION['user']['username'])) {
				$ddm = DrunkDataManager::getInstance();
				self::$userFile = new File("users/".$_SESSION['user']['username']."data", "rw");
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


}
 ?>