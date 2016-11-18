<?php
use Drunk\Exception\FileException;

/**
* This is a helper for css 
*/
class CssHelper
{
	public static function css($name, $options = array())
	{
		if (file_exists(join(DS, array(WWW, 'css', $name.'.css')))) {
			return '<link rel="stylesheet" type="text/css" href="'.BASE_URL.'/www/css/'.$name.'.css" >';
		}else{
			throw new FileException("CSS file ".$name."not found", 404);
		}
	}
}


?>