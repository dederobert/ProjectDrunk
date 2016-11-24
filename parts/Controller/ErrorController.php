<?php 

/**
 * File ErrorController.php
 *
 * PHP version 7
 * @category Controller
 * @package App\Controller
 * @license http://opensource.org/licenses/MIT
 * @link /
 * @since Version 0.0.1
 * @version 0.0.1
 */
namespace App\Controller;

use Drunk\Controller\Controller;

class ErrorController extends Controller
{

	public function e404($error)
	{
		header("HTTP/1.0 404 Not Found");
		$this->set("message",$error->getMessage());
		$this->set("trace",$error->getTrace());
	}

	public function e500($error)
	{
		$this->set("message", $error->getMessage());
		$this->set("trace",$error->getTrace());
	}
  	
} ?>