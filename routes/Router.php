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

namespace Routing;

use Routing\Route;
use Routing\Exception\RouteNotFoundException;
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
    private $_routes = [];

    /**
     * Router constructor.
     * 
     * @param string $url The currently dispatched url. 
     */
    public function __construct(private string $url)
    {
        $this->_url = $url;
    }

    /**
     * Add Route to GET.
     * 
     * @param Route $route Route instance.
     * 
     * @return $this Returns a route instance.
     */
    public function get(Route $route): self
    {
        $this->_routes['GET'][] = $route;
        return $this;
    }

    /**
     * Add Route to POST.
     * 
     * @param Route $route Route instance.
     * 
     * @return $this Returns a route instance.
     */
    public function post(Route $route): self
    {
        $this->_routes['POST'][] = $route;
        return $this;
    }

    /**
     * Add Route to PUT.  
     * 
     * @param Route $route Route instance.
     * 
     * @return $this Returns a route instance.
     */
    public function put(Route $route): self
    {
        $this->_routes['PUT'][] = $route;
        return $this;
    }

    /**
     * Add Route to DELETE. 
     * 
     * @param Route $route Route instance.
     * 
     * @return $this Returns a route instance.
     */
    public function delete(Route $route): self
    {
        $this->_routes['DELETE'][] = $route;
        return $this;
    }

    /**
     * Add Route to PATCH.  
     * 
     * @param Route $route Route instance.
     * 
     * @return $this Returns a route instance.
     */
    public function patch(Route $route): self
    {
        $this->_routes['PATCH'][] = $route;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getRoutes(): Route
    {
        if (!isset($this->_routes[$_SERVER['REQUEST_METHOD']])) {
            throw new InvalidArgumentException('REQUEST_METHOD does not exist');
        }
        foreach ($this->_routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->matches($this->_url)) {
                $route->compileRoute();
                return $route;
            }
        }
        throw new RouteNotFoundException('No matching routes');
    }
}
