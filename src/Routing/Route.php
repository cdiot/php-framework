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

/**
 * A Route describes a route and its parameters.
 * 
 * @category Routing
 * @package  src/Routing
 * @link     https://github.com/cdiot/php-framework
 */
class Route
{
    /**
     * Matches of Route
     * 
     * @var array
     */
    public $_matches = [];

    /**
     * the middleware for the given route.
     * 
     * @var array
     */
    public $_middleware = [];

    /**
     * Route constructor.
     * 
     * @param string         $uri    The URI pattern the route responds to.
     * @param array          $action The route action array.
     * @param array|null     $wheres The regular expression requirements.
     */
    public function __construct(public string $uri, public array $action, public ?array $wheres = [])
    {
        $this->setPath($uri);
        $this->_action = $action['controller'];
        if (isset($action['middleware'])) {
            $this->_middleware = $action['middleware'];
        }
        $this->setWheres($wheres);
    }

    /**
     * Sets the pattern for the uri.
     *
     * @param string $pattern pattern
     * 
     * @return $this Returns the uri.
     */
    public function setPath(string $pattern): self
    {
        $this->_uri = trim($pattern, '/');
        return $this;
    }

    /**
     * Set a list of regular expression requirements on the route.
     * 
     * @param array $wheres The regular expression requirements.
     * 
     * @return $this Returns the requirement for the given key.
     */
    public function setWheres(array $wheres): self
    { // where setWheres middleware matches
        foreach ($wheres as $name => $expression) {
            $this->_wheres[$name] = str_replace('(', '(?:', $expression);
        }
        return $this;
    }

    /**
     * Determine if the route matches a given request.
     * 
     * @param mixed $request The resource upon which to apply the request.
     * 
     * @return bool Returns true if the resource matching, false otherwise.
     */
    public function matches($request): bool
    {
        $uri = preg_replace_callback(
            '#:(\w+)#',
            function ($key) {
                return '(' . ($this->_wheres[$key[1]] ?? '[^/]+') . ')';
            },
            $this->_uri
        );
        if (!preg_match("#^" . $uri . "$#", trim($request, '/'), $matches)) {
            return false;
        }
        array_shift($matches);
        $this->_matches = $matches;
        return true;
    }


    /**
     * Compile the current route instance.
     * 
     * @return [type]
     */
    public function compileRoute()
    {
        if ($this->_middleware != null) {
            $middleware = "App\\Http\\Middleware\\" . $this->_middleware;
            new $middleware;
        }
        [$controller, $method] = explode('@', $this->_action, 2);
        return call_user_func_array([new $controller(), $method], $this->_matches);
    }
}
