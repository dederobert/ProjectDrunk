<?php
	define("ROOT", dirname(__DIR__));
	define("PARTS_PATH", join(DS, array(ROOT,"parts")));
	define("DATA_PATH", join(DS, array(ROOT, "data")));

	/**
	* 0 for debug
	* 1 for deployement
	*/
	define("DEBUG", 0);