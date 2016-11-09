<?php 
/**
* File Exception.php
*
* PHP version 7
* @category Exception
* @package Exception
* @link /
* @since Version 0.0.1
* @version 0.0.1
*/

namespace Drunk\Exception;

use RuntimeException;

/**
* Base class for dust exception 
*/
class FileException extends RuntimeException
{
	/**
	* Constructor
	*
	* Create a runtime exception
	*
	* @param string $message Error message
	* @param int $code The error code is also the HTTP statut 
	* @param \Exception|null $previous the previous exception 
	*/
	public function __construct($message, $code = 404, $previous = null)
	{
		parent::__construct($message, $code, $previous);
	}
}
 ?>