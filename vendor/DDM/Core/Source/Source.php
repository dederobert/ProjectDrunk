<?php 
/**
 * File Source.php
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

 
use DDM\DrunkDataManager;
use Drunk\Exception\Exception;
 /**
  * 
  */
  class Source
  {
  	private $name;
  	protected $mode;

  	private $valideMode = ['r','rw','w'];

  	function __construct($name, $mode = "r")
  	{
  		if (!in_array($mode, $this->valideMode)) throw new Exception("The given mod (".$mode.") for the data file ".$name." is not allow", 500);
  		
  		$this->name = $name;
  		$this->mode = $mode;
  	}

  	public function load($create)
  	{}


  } ?>