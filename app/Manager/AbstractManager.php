<?php

/**
 * This file is part of the Manager.
 * 
 * PHP version 8.1
 * 
 * @category Manager
 * @package  app/Manager
 * @link     https://github.com/cdiot/php-framework
 */

namespace App\Manager;

use Database\MySqlConnection;

/**
 * AbstractManager
 * 
 * @category Manager
 * @package  app/Manager
 * @link     https://github.com/cdiot/php-framework
 */
abstract class AbstractManager
{

    protected $database;

    /**
     * AbstractManager constructor.
     */
    public function __construct()
    {
        $this->database = MysqlConnection::getInstance();
    }
}
