<?php 
/**
 * File DataLoader.php
 *
 * PHP version 7
 * @category DataLoader
 * @package DDM\Core
 * @license http://opensource.org/licenses/MIT
 * @link /
 * @since Version 0.0.1
 * @version 0.0.1
 */

namespace DDM\Core;

use Drunk\Exception\FileException;

class Dataloader
{
	
	private $filePath;
	private $dataFile;

	function __construct($filePath)
	{
		if (file_exists($filePath)) {
			$this->filePath = $filePath;
		}else {
			throw new FileException("The data file ".$filePath." not exists");
			
		}
	}

	public function __get($property)
	{
		if ($property==="file") {
			return $this->dataFile;
		}
	}

}
  ?>