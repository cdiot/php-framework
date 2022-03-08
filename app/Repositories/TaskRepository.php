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

use App\Entities\Task;
use App\Entities\User;
use PDO;


/**
 * Task Repository.
 * 
 * @category Repositories
 * @package  app/Repositories
 * @link     https://github.com/cdiot/php-framework
 */
class TaskRepository extends AbstractRepository
{
    /**
     * GetAll
     *
     * @return array
     */
    public function getAll(): array
    {
        $req = $this->database->pdo()->prepare('SELECT * FROM tasks');
        $req->execute();
        $req->setFetchMode(PDO::FETCH_PROPS_LATE);
        $tasksData = $req->fetchAll();
        $tasks = [];
        foreach ($tasksData as $task) {
            $tasks[] = new Task($task);
        }
        return $tasks;
    }

    /**
     * GetById
     *
     * @param  int $id
     * 
     * @return mixed
     */
    public function getById(int $id)
    {
        $req = $this->database->pdo()->prepare('SELECT * FROM tasks where id = :id');
        $req->bindValue(':id', $id);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_PROPS_LATE);
        $taskData = $req->fetch();
        $user = new Task($taskData);

        return $user;
    }

    /**
     * GetByUser
     *
     * @param $userId userId
     * 
     * @return mixed
     */
    public function getByUsers($userId)
    {
        $req = $this->database->pdo()->prepare('SELECT * FROM tasks WHERE userId = :userId');
        $req->bindValue(':userId', $userId, PDO::PARAM_INT);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_PROPS_LATE);
        $tasksData = $req->fetchAll();
        $tasks = [];
        foreach ($tasksData as $task) {
            $tasks[] = new Task($task);
        }
        return $tasks;
    }

    /**
     * Create
     *
     * @param Task $task instance of Task
     * 
     * @return void
     */
    public function create(Task $task): void
    {
        $req = $this->database->pdo()->prepare('INSERT INTO tasks(createdAt, title, content, userId) VALUES( NOW(), :title, :content, :userId)');
        $req->bindValue(':title', $task->getTitle());
        $req->bindValue(':content', $task->getContent());
        $req->bindValue(':userId', $task->getUserId());
        $req->execute();
    }

    /**
     * Update
     *
     * @param Task $task instance of Task
     * 
     * @return void
     */
    public function update(Task $task): void
    {
        $req = $this->database->pdo()->prepare('UPDATE tasks SET createdAt = :createdAt, title = :title, content = :content WHERE id = :id)');
        $req->bindValue(':createdAt', $task->getCreatedAt());
        $req->bindValue(':title', $task->getTitle());
        $req->bindValue(':content', $task->getContent());
        $req->bindValue(':id', $task->getId(), PDO::PARAM_INT);
        $req->execute();
    }

    /**
     * Delete
     *
     * @param int $id id
     * 
     * @return void
     */
    public function delete(int $id): void
    {
        $this->database->pdo()->exec('DELETE FROM tasks WHERE id = ' . (int) $id);
    }
}
