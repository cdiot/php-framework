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

/**
 * LoginController handles authentication
 * 
 * @category Controllers
 * @package  app/Controllers
 * @link     https://github.com/cdiot/php-framework
 */
final class LoginController extends AbstractController
{
    /**
     * Allow to login
     * 
     * @return void
     */
    public function authenticate()
    {
        if (empty($_POST['email'])  || empty($_POST['password'])) {
            throw new \Exception("Not all fields are filled in.");
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $UserRepository = new UserRepository();
            $user = $UserRepository->getByMail($_POST['email']);
            if (!password_verify($_POST['password'], $user->getPassword())) {
                throw new \Exception("Wrong password or email address.");
            }
            if ($user) {
                $_SESSION['auth'] =  $user->getEmail();
                $_SESSION['userId'] = $user->getId();
                header("Location: /tasks");
            }
        }
    }

    /**
     * Show login form
     * 
     * @return string
     */
    public function displayAuthenticateForm()
    {
        return $this->view('auth/login');
    }

    /**
     * Allow to logout
     * 
     * @return void
     */
    public function logout()
    {
        unset($_SESSION);
        session_destroy();
        return header("Location: /login");
    }
}
