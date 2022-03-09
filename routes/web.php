<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the Router. Now create something great!
|
*/

use App\Routing\Router;

Router::get('/', ['controller' => 'App\Http\Controllers\HomeController@index']);
Router::get('/login', ['controller' => 'App\Http\Controllers\LoginController@displayAuthenticateForm']);
Router::post('/login', ['controller' => 'App\Http\Controllers\LoginController@authenticate']);
Router::get('/register', ['controller' => 'App\Http\Controllers\RegisterController@displayRegisterForm']);
Router::post('/register', ['controller' => 'App\Http\Controllers\RegisterController@register']);
Router::get('/tasks', ['controller' => 'App\Http\Controllers\TaskController@index', 'middleware' => 'Authenticate']);
Router::get('/task/:id', ['controller' => 'App\Http\Controllers\TaskController@show', 'middleware' => 'Authenticate'], ['id', '[0-9]+']);
Router::get('/add/task', ['controller' => 'App\Http\Controllers\TaskController@create', 'middleware' => 'Authenticate']);
Router::post('/add/task', ['controller' => 'App\Http\Controllers\TaskController@store', 'middleware' => 'Authenticate']);
