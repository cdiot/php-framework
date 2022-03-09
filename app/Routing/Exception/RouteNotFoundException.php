<?php

/**
 * This file is part of the Routing system.
 * 
 * PHP version 8.1
 * 
 * @category Routing
 * @package  Routing/Exception
 * @link     https://github.com/cdiot/php-framework
 */

namespace App\Routing\Exception;

use Exception;
use Throwable;

/**
 * The resource was not found.
 *
 * This exception should trigger an HTTP 404 response in your application code.
 * 
 * @category Routing
 * @package  Routing/Exception
 * @link     https://github.com/cdiot/php-framework
 */
class RouteNotFoundException extends Exception
{
    /**
     * Constructor class
     * 
     * @param string         $message  message
     * @param int            $code     code
     * @param Throwable|null $previous previous
     */
    public function __construct($message = "", $code = 404, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Force to string
     * 
     * @return [type]
     */
    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

    /**
     * Show error
     * 
     * @return [type]
     */
    public function error404()
    {
        http_response_code(404);
    }
}
