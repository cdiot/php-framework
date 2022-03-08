<?php
session_start();
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
    $router->get(new Route('/tasks', ['controller' => 'App\Http\Controllers\TaskController@index', 'middleware' => 'Authenticate']));
    $router->get(new Route('/task/:id', ['controller' => 'App\Http\Controllers\TaskController@show', 'middleware' => 'Authenticate'], ['id', '[0-9]+']));
    $router->get(new Route('/add/task', ['controller' => 'App\Http\Controllers\TaskController@create', 'middleware' => 'Authenticate']));
    $router->post(new Route('/add/task', ['controller' => 'App\Http\Controllers\TaskController@store', 'middleware' => 'Authenticate']));
    $router->getRoutes();
} catch (RouteNotFoundException $e) {
    return $e->error404();
} catch (\Exception $e) {
    echo $e->getMessage();
}
