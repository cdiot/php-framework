<?php

/**
 * This file is part of the Database.
 * 
 * PHP version 8.1
 * 
 * @category Database
 * @package  database
 * @link     https://github.com/cdiot/php-framework
 */

namespace Database;

use PDO;
use PDOException;
use LogicException;

/**
 * MySqlConnection
 * 
 * @category Database
 * @package  database
 * @link     https://github.com/cdiot/php-framework
 */
final class MySqlConnection  implements ConnectionInterface
{

    private $_pdo;
    private static $_instance = null;

    /**
     * DBConnection constructor.
     */
    private function __construct()
    {
        try {
            $this->_pdo = new PDO($_ENV['DB_CONNECTION'] . ':host=' . $_ENV['DB_HOST'] . '; port=' . $_ENV['DB_PORT']  . '; dbname=' . $_ENV['DB_DATABASE'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
            $this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
        } catch (PDOException $error) {
            return $error->getMessage();
        }
    }

    /**
     * Get instance
     * 
     * @return [type]
     */
    final public static function getInstance()
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Return message if Clone
     * 
     * @return [type]
     */
    public function __clone()
    {
        throw new LogicException('Forbidden to cloning !');
    }

    /**
     * Return message if wakeup
     * 
     * @return [type]
     */
    public function __wakeup()
    {
        throw new LogicException('Forbidden to make instances while deserializing !');
    }


    /**
     * Return pdo
     * 
     * @return [type]
     */
    public function pdo()
    {
        return $this->_pdo;
    }
}
