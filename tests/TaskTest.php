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

namespace Tests;

use App\Entities\Task;
use App\Entities\User;
use DateTime;
use PHPUnit\Framework\TestCase;

/**
 * Class TaskTest.
 * 
 * @category Tests
 * @package  tests
 * @link     https://github.com/cdiot/php-framework
 */
class TaskTest extends TestCase
{
    public function testIsTrue()
    {
        $task = new Task();
        $user = new User();
        $date = new DateTime();
        $task->setCreatedAt($date);
        $task->setTitle('Add new features');
        $task->setContent('We should develop new features.');
        $task->setUserId(1);
        $task->setUser($user);

        $this->assertTrue($task->getCreatedAt() === $date);
        $this->assertTrue($task->getTitle() === 'Add new features');
        $this->assertTrue($task->getContent() === 'We should develop new features.');
        $this->assertTrue($task->getUserId() === 1);
        $this->assertTrue($task->getUser() === $user);
    }

    public function testIsFalse()
    {
        $task = new Task();
        $user = new User();
        $date = new DateTime();
        $yesterday = new DateTime();
        $task->setCreatedAt($yesterday);
        $task->setTitle('Fix bugs');
        $task->setContent('We should fix bugs.');
        $task->setUserId(2);
        $task->setUser($user);

        $this->assertFalse($task->getCreatedAt() === $date);
        $this->assertFalse($task->getTitle() === 'Add new features');
        $this->assertFalse($task->getContent() === 'We should develop new features.');
        $this->assertFalse($task->getUserId() === 1);
    }

    public function testIsEmpty()
    {
        $task = new task();

        $this->assertEmpty($task->getCreatedAt());
        $this->assertEmpty($task->getTitle());
        $this->assertEmpty($task->getContent());
        $this->assertEmpty($task->getUserId());
        $this->assertEmpty($task->getUser());
    }
}
