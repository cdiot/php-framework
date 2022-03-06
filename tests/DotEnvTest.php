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


use App\Phpdotenv\DotEnv;
use PHPUnit\Framework\TestCase;

/**
 * Class DotEnvTest.
 * 
 * @category Tests
 * @package  tests
 * @link     https://github.com/cdiot/php-framework
 */
class DotEnvTest extends TestCase
{

    public function testLoad()
    {
        (new DotEnv(__DIR__  . DIRECTORY_SEPARATOR . 'env' . DIRECTORY_SEPARATOR . '/.env'))->load();
        $this->assertEquals('local', getenv('APP_ENV'));
        $this->assertEquals('mysql:host=localhost;dbname=phpframework;', getenv('DATABASE_DNS'));
        $this->assertEquals('root', getenv('DATABASE_USER'));
        $this->assertEquals('root', getenv('DATABASE_PASSWORD'));
        $this->assertFalse(getenv('API'));
        $this->assertFalse(getenv('MANAGER_KEY'));

        $this->assertEquals('local', $_ENV['APP_ENV']);
        $this->assertEquals('mysql:host=localhost;dbname=phpframework;', $_ENV['DATABASE_DNS']);
        $this->assertEquals('root', $_ENV['DATABASE_USER']);
        $this->assertEquals('root', $_ENV['DATABASE_PASSWORD']);
        $this->assertFalse(array_key_exists('API', $_ENV));
        $this->assertFalse(array_key_exists('MANAGER_KEY', $_ENV));

        $this->assertEquals('local', $_SERVER['APP_ENV']);
        $this->assertEquals('mysql:host=localhost;dbname=phpframework;', $_SERVER['DATABASE_DNS']);
        $this->assertEquals('root', $_SERVER['DATABASE_USER']);
        $this->assertEquals('root', $_SERVER['DATABASE_PASSWORD']);
        $this->assertFalse(array_key_exists('API', $_SERVER));
        $this->assertFalse(array_key_exists('MANAGER_KEY', $_SERVER));
    }

    public function testFileNotExist()
    {
        $this->expectException(\InvalidArgumentException::class);
        (new DotEnv(__DIR__  . DIRECTORY_SEPARATOR . 'env' . DIRECTORY_SEPARATOR . '/.env.local'))->load();
    }
}
