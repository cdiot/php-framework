<?php

require "../vendor/autoload.php";

use App\Phpdotenv\DotEnv;
use Routing\Exception\RouteNotFoundException;
use Routing\Router;
use Routing\Route;

$dotenv = new DotEnv('../.env');
$dotenv->load();

$router = new Router($_GET['url']);

try {
    $router->get(new Route('/', ['controller' => 'App\Http\Controllers\HomeController@index']));
    $router->get(new Route('/login', ['controller' => 'App\Http\Controllers\LoginController@displayAuthenticateForm']));
    $router->post(new Route('/login', ['controller' => 'App\Http\Controllers\LoginController@authenticate']));
    $router->get(new Route('/register', ['controller' => 'App\Http\Controllers\RegisterController@displayRegisterForm']));
    $router->post(new Route('/register', ['controller' => 'App\Http\Controllers\RegisterController@register']));
    $router->getRoutes();
} catch (RouteNotFoundException $e) {
    return $e->error404();
} catch (\Exception $e) {
    echo $e->getMessage();
}
