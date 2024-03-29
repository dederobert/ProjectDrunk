<?php
use Drunk\Exception\FileException;

/**
* 
*/
class ImgHelper
{
	/**
	* Return the path of given image name if exist
	* 
	* @return The path of image
	* @throws FileException, if the given file doesn't exist
	*/
	public static function img($name, $options = array()) {
		$options = $options+ [
			'alt' => 'image',
			'class' => '',
			'name' => '',
			'not_found' => false
		];

		$name = str_replace(" ", "_", $name);

		if (file_exists(join(DS, array(WWW, "imgs", $name)))) {
			return '<img src="'.BASE_URL."www/imgs/".$name.'" alt="'.$options['alt'].'" class="'.$options['class'].'" name="'.$options['name'].'" />';
		}else{
			if ($options['not_found'] !== false) {
				return $options['not_found'];
			}else{
				throw new FileException("Image file ".$name." not found", 404);
			}
		}
	}
}
 ?>