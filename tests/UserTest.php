<?php

/**
 * This file is part of the Tests.
 * 
 * PHP version 8.1
 * 
 * @category Tests
 * @package  tests
 * @link     https://github.com/cdiot/php-framework
 */

namespace App\Tests;

use App\Entities\User;
use PHPUnit\Framework\TestCase;

/**
 * Class UserTest.
 * 
 * @category Tests
 * @package  tests
 * @link     https://github.com/cdiot/php-framework
 */
class UserTest extends TestCase
{
    public function testIsTrue()
    {
        $user = new User();
        $user->setEmail('foo@test.com');
        $user->setRoles('ROLE_USER');
        $user->setPassword('123456');
        $user->setFirstname('Louis');
        $user->setLastname('Legrand');

        $this->assertTrue($user->getEmail() === 'foo@test.com');
        //$this->assertTrue($user->getRoles() === ['ROLE_USER']);
        $this->assertTrue($user->getPassword() === '123456');
        $this->assertTrue($user->getFirstname() === 'Louis');
        $this->assertTrue($user->getLastname() === 'Legrand');
    }

    public function testIsFalse()
    {
        $user = new User();
        $user->setEmail('bar@test.com');
        $user->setRoles('ROLE_ADMIN');
        $user->setPassword('azerty');
        $user->setFirstname('Thomas');
        $user->setLastname('Lepetit');

        $this->assertFalse($user->getEmail() === 'foo@test.com');
        //$this->assertFalse($user->getRoles() === ['ROLE_USER']);
        $this->assertFalse($user->getPassword() === '123456');
        $this->assertFalse($user->getFirstname() === 'Louis');
        $this->assertFalse($user->getLastname() === 'Legrand');
    }

    public function testIsEmpty()
    {
        $user = new User();
        $user->setEmail('');
        $user->setPassword('');
        $user->setFirstname('');
        $user->setLastname('');

        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getPassword());
        $this->assertEmpty($user->getFirstname());
        $this->assertEmpty($user->getLastname());
    }
}
