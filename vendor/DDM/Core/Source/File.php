<?php 
/**
 * File File.php
 *
 * PHP version 7
 * @category Source
 * @package DDM\Core\Source
 * @license http://opensource.org/licenses/MIT
 * @link /
 * @since Version 0.0.1
 * @version 0.0.1
 */
 namespace DDM\Core\Source;

 use DDM\Core\Source\Source;
 use DDM\DrunkDataManager;
 use Drunk\Exception\FileException;
 use Drunk\Exception\Exception;

 /**
  * 
  */
  class File extends Source
  {

    private $name;

  	function __construct($name, $mode = "r")
  	{
  		parent::__construct($name, $mode);
      $this->name = $name;
  	}

    public function load($create)
    {
      if (!file_exists(DrunkDataManager::$dataFolder.DS.$this->name)) {
        if ($create) {
          mkdir(DrunkDataManager::$dataFolder.DS.dirname($this->name));
          file_put_contents(DrunkDataManager::$dataFolder.DS.$this->name, "\n");
        }else {
          throw new FileException("The request data file ".$this->name." not found", 500);
          
        }
      } 
      // Il inclus seulement les fichiers PHP
      if (mime_content_type(DrunkDataManager::$dataFolder.DS.$this->name) == "text/x-php")  
        include_once DrunkDataManager::$dataFolder.DS.$this->name;
    }

    public function write($data)
    {
      if ($this->mode == "r") throw new Exception("Is not allow to write in read-only file", 500);
      file_put_contents(DrunkDataManager::$dataFolder.DS.$this->name, $data);
    }

    public function read()
    {
      if ($this->mode == "w") throw new Exception("Is not allow to read in write-only file", 500);
      return file_get_contents(DrunkDataManager::$dataFolder.DS.$this->name);
    }
  } ?>