<?php

/**
 * This file is part of the Routing system.
 * 
 * PHP version 8.1
 * 
 * @category Routing
 * @package  src/Routing
 * @link     https://github.com/cdiot/php-framework
 */

namespace Src\Routing;

use Src\Routing\Route;

/**
 * RouterInterface is the interface that all Router classes must implement.
 * 
 * @category Routing
 * @package  src/Routing
 * @link     https://github.com/cdiot/php-framework
 */
interface RouterInterface
{
    /**
     * Get the underlying route collection.
     * 
     * @return array|Route[] Returns a route instance.
     * @throws RouteNotFoundException If the requested page cannot be found.
     */
    public static function getRoutes(): Route;
}
