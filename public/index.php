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
    Router::getRoutes();
} catch (RouteNotFoundException $e) {
    return $e->error404();
} catch (\Exception $e) {
    echo $e->getMessage();
}
