<?php

/**
 * This file is part of the Repositories.
 * 
 * PHP version 8.1
 * 
 * @category Repositories
 * @package  app/Repositories
 * @link     https://github.com/cdiot/php-framework
 */

namespace App\Repositories;

use Database\PdoConnection;

/**
 * AbstractRepository
 * 
 * @category Repositories
 * @package  app/Repositories
 * @link     https://github.com/cdiot/php-framework
 */
abstract class AbstractRepository
{

    protected $database;

    /**
     * AbstractRepository constructor.
     */
    public function __construct()
    {
        $this->database = PdoConnection::getInstance();
    }
}
