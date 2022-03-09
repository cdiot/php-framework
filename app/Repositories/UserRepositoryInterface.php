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

use App\Entities\User;

/**
 * UserRepositoryInterface.
 * 
 * @category Repositories
 * @package  app/Repositories
 * @link     https://github.com/cdiot/php-framework
 */
interface UserRepositoryInterface
{
    public function getAll();
    public function getById(int $id);
    public function create(User $user);
    public function update(User $user);
    public function delete(int $id);
}
