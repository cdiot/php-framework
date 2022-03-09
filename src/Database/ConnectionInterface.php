<?php

/**
 * This file is part of the Database.
 * 
 * PHP version 8.1
 * 
 * @category Database
 * @package  src/database
 * @link     https://github.com/cdiot/php-framework
 */

namespace Src\Database;

/**
 * ConnectionInterface
 * 
 * @category Database
 * @package  src/database
 * @link     https://github.com/cdiot/php-framework
 */
interface ConnectionInterface
{
    public static function getInstance();
}
