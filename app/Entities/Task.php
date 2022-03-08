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

use DateTime;

/**
 * Task Entity
 * 
 * @category Entities
 * @package  app/Entities
 * @link     https://github.com/cdiot/php-framework
 */
class Task extends AbstractEntity
{
    /**
     * Id
     * 
     * @var int
     */
    private $_id;

    /**
     * CreatedAt
     * 
     * @var DateTime
     */
    private $_createdAt;

    /**
     * title
     * 
     * @var string
     */
    private $_title;

    /**
     * content
     * 
     * @var string
     */
    private $_content;

    /**
     * UserId
     * 
     * @var int
     */
    private $_userId;

    /**
     * User
     * 
     * @var User
     */
    private $_user;

    /**
     * Get id
     * 
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Set id
     * 
     * @param int $id id
     * 
     * @return void
     */
    public function setId(int $id): void
    {
        $this->_id = (int) $id;
    }

    /**
     * Get createdAt
     * 
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->_createdAt;
    }

    /**
     * Set createdAd
     * 
     * @param DateTime $createdAt createdAt
     * 
     * @return void
     */
    public function setCreatedAt($createdAt): void
    {
        $this->_createdAt = $createdAt;
    }

    /**
     * Get title
     * 
     * @return string
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * Set title
     * 
     * @param string $title title
     * 
     * @return void
     */
    public function setTitle($title)
    {
        $this->_title = $title;
    }

    /**
     * Get content
     * 
     * @return string
     */
    public function getContent()
    {
        return $this->_content;
    }

    /**
     * Set content
     * 
     * @param string $content content
     * 
     * @return void
     */
    public function setContent($content): void
    {
        $this->_content = $content;
    }

    /**
     * Get userId
     * 
     * @return int
     */
    public function getUserId()
    {
        return $this->_userId;
    }

    /**
     * Set UserId
     * 
     * @param int $userId userId 
     * 
     * @return void
     */
    public function setUserId(int $userId): void
    {
        $this->_userId = $userId;
    }

    /**
     * Get user
     * 
     * @return User $user user
     */
    public function getUser(): ?User
    {
        return $this->_user;
    }

    /**
     * Set user
     * 
     * @param User $user user
     * 
     * @return void
     */
    public function setUser(?User $user): self
    {
        $this->_user = $user;

        return $this;
    }
}
