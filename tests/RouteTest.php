<?php

/**
 * This file is part of the Tests.
 * 
 * PHP version 8.1
 * 
 * @category Tests
 * @package  tests
 * @link     https://github.com/cdiot/php-framework
 */

namespace Tests;

use Routing\Route;
use PHPUnit\Framework\TestCase;

/**
 * Class RouteTest.
 * 
 * @category Tests
 * @package  tests
 * @link     https://github.com/cdiot/php-framework
 */
class RouteTest extends TestCase
{

    public function testNotMatchRoute()
    {
        $routeWithoutAttribute = new Route('/', ['controller' => 'App\Controller\HomeController@index']);
        $routeWithAttribute = new Route('/task/:id', ['controller' => 'App\Controller\TaskController@show'], ['id', '[0-9]+']);

        $this->assertFalse($routeWithoutAttribute->matches('/1'));
        $this->assertFalse($routeWithAttribute->matches('/task'));
    }

    public function testMatchRoute()
    {
        $routeWithoutAttribute = new Route('/', ['controller' => 'App\Controller\HomeController@index']);
        $routeWithAttribute = new Route('/task/:id', ['controller' => 'App\Controller\TaskController@show'], ['id', '[0-9]+']);

        $this->assertTrue($routeWithoutAttribute->matches('/'));
        $this->assertTrue($routeWithAttribute->matches('/task/1'));
    }
}
