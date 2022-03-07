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

/**
 * RepositoryInterface.
 * 
 * @category Repositories
 * @package  app/Repositories
 * @link     https://github.com/cdiot/php-framework
 */
interface RepositoryInterface
{
    public function getAll();
    public function getById(int $id);
    public function create(object $entity);
    public function update(object $entity);
    public function delete(int $id);
}
