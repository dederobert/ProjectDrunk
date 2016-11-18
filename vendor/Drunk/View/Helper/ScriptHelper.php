<?php 
use Drunk\Exception\FileException;

/**
* 
*/
class ScriptHelper
{
	public static function script($name, $options = array())
	{
		if (file_exists(join(DS,array(WWW, "js", $name.'.js')))) {
			return '<script src="'.BASE_URL.'/www/js/'.$name.'.js"></script>';
		}else{
			throw new FileException("Script file ".$name." not found", 404);
		}
	}
}
 ?>