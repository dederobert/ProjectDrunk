<?php 
/**
* File DrunkDataManager.php
*
* PHP version 5
* @category DataManager
* @package DDM
* @license http://opensource.org/licenses/MIT
* @link /
* @since Version 0.0.1
* @version 0.0.1
*/

namespace DDM;

use DDM\Core\DataLoader;
use Drunk\Exception\FileException;

/**
* 
*/
class DrunkDataManager
{

	private static $instance;
	public static $dataFolder;
	
	private $sourceLoaders = array();

	private function __construct()
	{
		if (self::$dataFolder == null) = self::$dataFolder = join(DS, array(ROOT,"data"));
		
		if (!is_dir(self::$dataFolder)) {
			mkdir(self::$dataFolder);
		}else{
			if (!is_writable(self::$dataFolder)) throw new FileException("The data folder is not writable", 500);
		}	
	}

	function load($source, $create) {
		if (!isset($this->sourceLoaders[$source->name])) {
			$this->sourceLoaders[$source->name] = $source;
			$source->load($create);
			return $source;
		}else{
			return $this->sourceLoaders[$source->name];
		}
	}

	public static function getInstance()
	{
		if (self::$instance == null) self::$instance = new self();
		return self::$instance;
	}

	public function save_all()
	{
		foreach ($this->sourceLoader as $source) {
			if ($source->dirty) {
				$source->save();
			}
		}
	}

	public function get($i)
	{
		if ($i < count($this->sourceLoaders) && $i >= 0) {
			var_dump($this);
			return $this->sourceLoaders[$i];
		}
	}
}
 ?>
