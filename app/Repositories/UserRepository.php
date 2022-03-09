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
use PDO;

/**
 * User Repository.
 * 
 * @category Repositories
 * @package  app/Repositories
 * @link     https://github.com/cdiot/php-framework
 */
class UserRepository extends AbstractRepository implements UserRepositoryInterface
{
    /**
     * GetAll
     *
     * @return array
     */
    public function getAll(): array
    {
        $req = $this->database->pdo()->prepare('SELECT * FROM users');
        $req->execute();
        $req->setFetchMode(PDO::FETCH_PROPS_LATE);
        $usersData = $req->fetchAll();
        $users = [];
        foreach ($usersData as $user) {
            $users[] = new User($user);
        }
        return $users;
    }

    /**
     * GetById
     *
     * @param  int $firstname
     * 
     * @return mixed
     */
    public function getById(int $id)
    {
        $req = $this->database->pdo()->prepare('SELECT id FROM users where id= :id');
        $req->bindValue(':id', $id);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_PROPS_LATE);
        $userData = $req->fetch();
        $user = new User($userData);

        return $user;
    }

    /**
     * GetByMail
     *
     * @param $email email of User
     * 
     * @return mixed
     */
    public function getByMail($email)
    {
        $req = $this->database->pdo()->prepare('SELECT * FROM users WHERE email = :email');
        $req->bindValue(':email', $email);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_PROPS_LATE);
        $userData = $req->fetch();
        $user = new User($userData);

        return $user;
    }

    /**
     * Create
     *
     * @param User $user instance of User
     * 
     * @return void
     */
    public function create(User $user): void
    {
        $req = $this->database->pdo()->prepare('INSERT INTO users(firstname, lastname, email, password, roles) VALUES(:firstname, :lastname, :email, :password, :roles)');
        $req->bindValue(':firstname', $user->getFirstname());
        $req->bindValue(':lastname', $user->getLastname());
        $req->bindValue(':email', $user->getEmail());
        $req->bindValue(':password', $user->getPassword());
        $req->bindValue(':roles', $user->getRoles());
        $req->execute();
    }

    /**
     * Update
     *
     * @param User $user instance of User
     * 
     * @return void
     */
    public function update(User $user): void
    {
        $req = $this->database->pdo()->prepare('UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email, password = :password, roles = :roles WHERE id = :id)');
        $req->bindValue(':firstname', $user->getFirstname());
        $req->bindValue(':lastname', $user->getLastname());
        $req->bindValue(':email', $user->getEmail());
        $req->bindValue(':password', $user->getPassword());
        $req->bindValue(':roles', $user->getRoles());
        $req->bindValue(':id', $user->getId(), PDO::PARAM_INT);
        $req->execute();
    }

    /**
     * Delete
     *
     * @param int $id id of user
     * 
     * @return void
     */
    public function delete(int $id): void
    {
        $this->database->pdo()->exec('DELETE FROM users WHERE id = ' . (int) $id);
    }
}
