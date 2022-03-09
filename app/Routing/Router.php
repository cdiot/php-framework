<?php

/**
 * This file is part of the Routing system.
 * 
 * PHP version 8.1
 * 
 * @category Routing
 * @package  Routing
 * @link     https://github.com/cdiot/php-framework
 */

namespace App\Routing;

use App\Routing\Route;
use App\Routing\Exception\RouteNotFoundException;
use InvalidArgumentException;

/**
 * The Router class integrates all the elements of the routing system for easier use. 
 * 
 * @category Routing
 * @package  Routing
 * @link     https://github.com/cdiot/php-framework
 */
class Router implements RouterInterface
{
    /**
     * The route collection instance.
     * 
     * @var Route[]
     */
    private static $_routes = [];

    /**
     * The current url.
     * 
     * @var string
     */
    private static $_url;

    /**
     * Router constructor.
     * 
     * @param string $url The currently dispatched url. 
     */
    public function __construct(string $url)
    {
        self::$_url = $url;
    }

    /**
     * Register a new GET route with the router.
     * 
     * @param  string  $uri
     * @param  array   $action
     * @param  ?array  $wheres
     * 
     * @return Route Returns a route instance.
     */
    public static function get(string $uri, array $action, ?array $wheres = []): Route
    {
        return self::addRoute('GET', $uri, $action, $wheres);
    }

    /**
     * Register a new POST route with the router.
     * 
     * @param  string  $uri
     * @param  array   $action
     * @param  ?array  $wheres
     * 
     * @return Route Returns a route instance.
     */
    public static function post(string $uri, array $action, ?array $wheres = []): Route
    {
        return self::addRoute('POST', $uri, $action, $wheres);
    }

    /**
     * Register a new PUT route with the router. 
     * 
     * @param  string  $uri
     * @param  array   $action
     * @param  ?array  $wheres
     * 
     * @return Route Returns a route instance.
     */
    public static function put(string $uri, array $action, ?array $wheres = []): Route
    {
        return self::addRoute('PUT', $uri, $action, $wheres);
    }

    /**
     * Register a new PATCH route with the router.  
     * 
     * @param  string  $uri
     * @param  array   $action
     * @param  ?array  $wheres
     * 
     * @return Route Returns a route instance.
     */
    public static function patch(string $uri, array $action, ?array $wheres = []): Route
    {
        return self::addRoute('PATCH', $uri, $action, $wheres);
    }

    /**
     * Register a new DELETE route with the router.
     * 
     * @param  string  $uri
     * @param  array   $action
     * @param  ?array  $wheres
     * 
     * @return Route Returns a route instance.
     */
    public static function delete(string $uri, array $action, ?array $wheres = []): Route
    {
        return self::addRoute('DELETE', $uri, $action, $wheres);
    }

    /**
     * Add a route to the underlying route collection. 
     * 
     * @param  string  $method
     * @param  string  $uri
     * @param  array   $action
     * @param  ?array  $wheres
     * 
     * @return Route Returns a route instance.
     */
    private static function addRoute($method, $uri, $action, $wheres): Route
    {
        $route = new Route($uri, $action, $wheres);
        self::$_routes[$method][] = $route;
        return $route;
    }

    /**
     * {@inheritdoc}
     */
    public static function getRoutes(): Route
    {
        if (!isset(self::$_routes[$_SERVER['REQUEST_METHOD']])) {
            throw new InvalidArgumentException('REQUEST_METHOD does not exist');
        }
        foreach (self::$_routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->matches(self::$_url)) {
                $route->compileRoute();
                return $route;
            }
        }
        throw new RouteNotFoundException('No matching routes');
    }
}
