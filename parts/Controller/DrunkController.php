<?php
namespace App\Controller;

use Drunk\Controller\Controller;

class DrunkController extends Controller {
	
	public function view($p1,$p2) {
		echo "ça marche !!! ";
		echo $p1;
		echo $p2;
	}
	
}
?>