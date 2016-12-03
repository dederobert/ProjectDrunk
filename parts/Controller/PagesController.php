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
 use DDM\DrunkDataManager;

 /**
  * 
  */
  class PagesController extends Controller
  {

    public function preInit()
    {
      parent::preInit();
      $this->breadKey = $this->callAction;
      if ($this->callAction === "test" ||$this->callAction === "bread"||$this->callAction === "truc") {
        $this->bread = 1;
      }
    }

  	public function view($page)
  	{
  		$this->set("title", "Hello world");
  		$this->renderView("pages",$page);
      // $this->set("ddm", DrunkDataManager::getInstance()->get(0));
  	}

    public function test($i)
    {
      
    }

    public function bread()
    {
      
    }

    public function truc()
    {
      var_dump($this->parent);
    }

  } ?>