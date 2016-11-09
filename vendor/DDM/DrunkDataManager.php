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
	
	private $dataLoaders;

	function __construct()
	{}

	function load($dataFileName) {
		try{
			$this->dataLoader[] = new DataLoader(DATA_PATH.DS.$dataFileName);
		}catch(FileException $e){
			throw new FileException("The file ".$dataFileName." not exists",500,$e);
		}
	}
}
 ?>