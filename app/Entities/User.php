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
 * User Entity
 * 
 * @category Entities
 * @package  app/Entities
 * @link     https://github.com/cdiot/php-framework
 */
class User extends AbstractEntity
{
    /**
     * Id of User
     * 
     * @var int
     */
    private $_id;

    /**
     * Email of User
     * 
     * @var string
     */
    private $_email;

    /**
     * Roles of User
     * 
     * @var string
     */
    private $_roles  = [];

    /**
     * Password of User
     * 
     * @var string
     */
    private $_password;

    /**
     * Firstname of User
     * 
     * @var string
     */
    private $_firstname;

    /**
     * Lastname of User
     * 
     * @var string
     */
    private $_lastname;

    /**
     * Get id
     * 
     * @return int
     */
    public function getId(): int
    {
        return $this->_id;
    }

    /**
     * Set id
     * 
     * @param int $id id of User
     * 
     * @return void
     */
    public function setId(int $id)
    {
        $this->_id = (int) $id;
    }

    /**
     * Get email
     * 
     * @return string
     */
    public function getEmail(): string
    {
        return $this->_email;
    }

    /**
     * Set email
     * 
     * @param string $email email of User
     * 
     * @return void
     */
    public function setEmail(string $email): void
    {
        $this->_email = $email;
    }

    /**
     * Returns the roles granted to the user.
     * 
     * @return string[] 
     */
    public function getRoles(): string
    {
        $roles = $this->_roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return json_encode($roles);
    }

    /**
     * Set Roles
     * 
     * @param string $roles roles of User
     * 
     * @return void
     */
    public function setRoles(string $roles): void
    {
        $this->_roles = $roles;
    }

    /**
     * Get password
     * 
     * @return string
     */
    public function getPassword(): ?string
    {
        return $this->_password;
    }

    /**
     * Set password
     * 
     * @param string $password password of User
     * 
     * @return void
     */
    public function setPassword(string $password): void
    {
        $this->_password = $password;
    }

    /**
     * Get firstname
     * 
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->_firstname;
    }

    /**
     * Set firsname
     * 
     * @param string $firstname firstname of User
     * 
     * @return void
     */
    public function setFirstname(string $firstname): void
    {
        $this->_firstname = $firstname;
    }

    /**
     * Get Lastname
     * 
     * @return string
     */
    public function getLastname(): string
    {
        return $this->_lastname;
    }

    /**
     * Set Lastname
     * 
     * @param string $lastname lastname of User
     * 
     * @return void
     */
    public function setLastname(string $lastname): void
    {
        $this->_lastname = $lastname;
    }
}
