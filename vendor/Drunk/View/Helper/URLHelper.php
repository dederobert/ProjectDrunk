<?php
use Drunk\Exception\FileException;
/**
* 
*/
class URLHelper
{
	/**
	* Create a URL
	* 
	* @param $uri array
	*	- controller
	*	- action
	*	- params array
	*/
	public static function URL($uri = array())
	{
		if (isset($uri['controller'])) {
			if (isset($uri['action'])) {
				return join('/' ,array_merge(array(BASE_URL, $uri['controller'], $uri['action']), isset($uri['params'])?$uri['params']:[]));	
			}else {
				return join('/' ,array_merge(array(BASE_URL, $uri['controller'], 'index'), isset($uri['params'])?$uri['params']:[]));
			}
		}else{
			return join('/', array(BASE_URL));
		}
	}

	/**
	* 
	*
	* @param $url Array
	* @param $title
	*/
	public static function link($url, $title, $options = array())
	{
		return '<a href="'.self::URL($url).'">'.$title.'</a>';
	}
}
?>