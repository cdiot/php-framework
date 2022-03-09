<?php

/**
 * This file is part of the Controllers.
 * 
 * PHP version 8.1
 * 
 * @category Controllers
 * @package  app/Controllers
 * @link     https://github.com/cdiot/php-framework
 */

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use App\Entities\User;

/**
 * RegisterController handles new user registration
 * 
 * @category Controllers
 * @package  app/Controllers
 * @link     https://github.com/cdiot/php-framework
 */
class RegisterController extends Controller
{
    /**
     * Allow to register
     * 
     * @return void
     */
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['email']) || empty($_POST['password'])) {
                throw new \Exception("Not all fields are filled in.");
            }
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                throw new \Exception("Invalid email.");
            }
            $UserManager = new UserRepository();

            $user = new User(
                [
                    'firstname' => $_POST['firstname'],
                    'lastname' => $_POST['lastname'],
                    'email' => $_POST['email'],
                    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
                ]
            );
            $UserManager->create($user);
            return header("Location: /login");
        }
    }

    /**
     * Show register form
     * 
     * @return string
     */
    public function displayRegisterForm()
    {
        return $this->view('auth/register');
    }
}
