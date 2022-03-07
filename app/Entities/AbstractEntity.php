<?php

/**
 * This file is part of the Entities.
 * 
 * PHP version 8.1
 * 
 * @category Entities
 * @package  app/Entities
 * @link     https://github.com/cdiot/php-framework
 */

namespace App\Entities;

/**
 * AbstractEntity
 * 
 * @category Entities
 * @package  app/Entities
 * @link     https://github.com/cdiot/php-framework
 */
abstract class AbstractEntity
{
    /**
     * AbstractEntity constructor.
     * 
     * @param array $datas datas to pass
     */
    public function __construct($datas = [])
    {
        if (!empty($datas)) {
            $this->hydrate($datas);
        }
    }

    /**
     * Allow to handling of stored data
     * 
     * @param array $datas datas to hydrate
     * 
     * @return [type]
     */
    public function hydrate(array $datas)
    {
        foreach ($datas as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (is_callable([$this, $method])) {
                $this->$method($value);
            }
        }
    }
}
