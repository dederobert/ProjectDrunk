<?php 
/**
 * File PagesController.php
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

 /**
  * 
  */
  class PagesController extends Controller
  {
  	public function view($page)
  	{
  		$this->set("title", "Hello world");
  		$this->renderView("pages",$page);
  	}
  } ?>