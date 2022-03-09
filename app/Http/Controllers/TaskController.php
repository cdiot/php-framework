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

use App\Entities\Task;
use App\Repositories\TaskRepository;

/**
 * TaskController
 * 
 * @category Controllers
 * @package  app/Controllers
 * @link     https://github.com/cdiot/php-framework
 */
class TaskController extends Controller
{
    private $_taskRepository;

    /**
     * TaskController constructor.
     */
    public function __construct()
    {
        $this->_taskRepository = new TaskRepository();
    }

    /**
     * Display a listing of the resource.
     * 
     * @return string
     */
    public function index()
    {
        $tasks = $this->_taskRepository->getByUsers($_SESSION['userId']);
        return $this->view('task/index', ['tasks' => $tasks]);
    }

    /**
     * Display the specified resource.
     * 
     * @param int $taskId id of task
     * 
     * @return string
     */
    public function show(int $taskId)
    {
        $task = $this->_taskRepository->getById($taskId);
        return $this->view('task/show', ['task' => $task]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return string
     */
    public function create()
    {
        return $this->view('task/add');
    }

    /**
     * Store a newly created resource.
     * 
     * @return void
     */
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (empty($_POST['title']) || empty($_POST['content'])  || empty($_SESSION['userId'])) {
                throw new \Exception("Not all fields are filled in.");
            }
            // Adding a task
            $task = new Task(
                [
                    'title' => $_POST['title'],
                    'content' => $_POST['content'],
                    'userId' => $_SESSION['userId']
                ]
            );
            $this->_taskRepository->create($task);

            return header("Location: /tasks");
        }
    }
}
