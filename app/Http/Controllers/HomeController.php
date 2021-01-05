<?php

namespace App\Http\Controllers;
use App\Repository\TaskRepository;

class HomeController extends Controller
{
    private $taskRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TaskRepository $taskRepository)
    {
        $this->middleware('auth');
        $this->taskRepository = $taskRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tasks = $this->taskRepository->getRecentTasksOfCurrentUser(3);
        return view('home', compact('tasks'));
    }
}
