<?php

/**
 * This file is part Middleware.
 * 
 * PHP version 8.1
 * 
 * @category Middleware
 * @package  app/Http/Middleware
 * @link     https://github.com/cdiot/php-framework
 */

namespace App\Http\Middleware;

use App\Routing\Exception\RouteNotFoundException;

/**
 * Authenticate
 * 
 * @category Middleware
 * @package  app/Http/Middleware
 * @link     https://github.com/cdiot/php-framework
 */
class Authenticate
{
    /**
     * Authenticate constructor.
     */
    public function __construct()
    {
        if (!$this->_authorize()) {
            throw new RouteNotFoundException("Access forbidden.");
        }
    }

    /**
     * Allow access to auth
     * 
     * @return [type]
     */
    private function _authorize()
    {
        return $_SESSION['auth'] != null;
    }
}
