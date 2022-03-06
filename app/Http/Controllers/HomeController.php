<?php

/**
 * This file is part of the Controllers.
 * 
 * PHP version 8.1
 * 
 * @category Controllers
 * @package  app/Http/Controllers
 * @link     https://github.com/cdiot/php-framework
 */

namespace App\Http\Controllers;

/**
 * HomeController
 * 
 * @category Controllers
 * @package  app/Http/Controllers
 * @link     https://github.com/cdiot/php-framework
 */
class HomeController extends AbstractController
{
    /**
     * Show the homepage
     * 
     * @return string
     */
    public function index()
    {
        return $this->view('welcome', []);
    }
}
