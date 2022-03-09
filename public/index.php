<?php
session_start();
require "../vendor/autoload.php";

use Src\Phpdotenv\DotEnv;
use Src\Routing\Exception\RouteNotFoundException;
use Src\Routing\Router;

$dotenv = new DotEnv('../.env');
$dotenv->load();

$router = new Router($_GET['url']);

try {
    Router::getRoutes();
} catch (RouteNotFoundException $e) {
    return $e->error404();
} catch (\Exception $e) {
    echo $e->getMessage();
}
