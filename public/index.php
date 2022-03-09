<?php
session_start();
require "../vendor/autoload.php";

use App\Phpdotenv\DotEnv;
use Routing\Exception\RouteNotFoundException;
use App\Routing\Router;

$dotenv = new DotEnv('../.env');
$dotenv->load();

$router = new Router($_GET['url']);

try {
    Router::get('/', ['controller' => 'App\Http\Controllers\HomeController@index']);
    Router::get('/login', ['controller' => 'App\Http\Controllers\LoginController@displayAuthenticateForm']);
    Router::post('/login', ['controller' => 'App\Http\Controllers\LoginController@authenticate']);
    Router::get('/register', ['controller' => 'App\Http\Controllers\RegisterController@displayRegisterForm']);
    Router::post('/register', ['controller' => 'App\Http\Controllers\RegisterController@register']);
    Router::get('/tasks', ['controller' => 'App\Http\Controllers\TaskController@index', 'middleware' => 'Authenticate']);
    Router::get('/task/:id', ['controller' => 'App\Http\Controllers\TaskController@show', 'middleware' => 'Authenticate'], ['id', '[0-9]+']);
    Router::get('/add/task', ['controller' => 'App\Http\Controllers\TaskController@create', 'middleware' => 'Authenticate']);
    Router::post('/add/task', ['controller' => 'App\Http\Controllers\TaskController@store', 'middleware' => 'Authenticate']);
    Router::getRoutes();
} catch (RouteNotFoundException $e) {
    return $e->error404();
} catch (\Exception $e) {
    echo $e->getMessage();
}
