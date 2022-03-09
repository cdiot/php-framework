<?php

/**
 * This file is the base of the Controllers.
 * 
 * PHP version 8.1
 * 
 * @category Controllers
 * @package  app/Http/Controllers
 * @link     https://github.com/cdiot/php-framework
 */

namespace App\Http\Controllers;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

/**
 * Controller
 * 
 * @category Controllers
 * @package  app/Http/Controllers
 * @link     https://github.com/cdiot/php-framework
 */
abstract class Controller
{

    /**
     * Render view
     *  
     * @param string $path  Path to pass
     * @param array  $datas Datas to pass
     * 
     * @return string
     */
    public function view(string $path, array $datas = [])
    {
        $loader = new FilesystemLoader('../resources/views');
        $twig = new Environment(
            $loader,
            [
                'cache' => false,
            ]
        );
        echo $twig->render($path . '.html.twig', $datas);
    }
}
