<?php 
/**
* File Exception.php
*
* PHP version 5
* @category Exception
* @package Exception
* @link /
* @since Version 0.0.1
* @version 0.0.1
*/

namespace Drunk\Exception;

use Drunk\Exception\Exception;

/**
* Exception to manage malformed uri
*/
class URIException extends Exception {
	/**
	* Constructor
	*
	* Create a runtime exception
	*
	* @param string $message Error message
	* @param int $code The error code is also the HTTP statut 
	* @param \Exception|null $previous the previous exception 
	*/
	public function __construct($message, \Exception $previous =null)
	{
		parent::__construct($message,404,$previous);
	}
}
 ?>