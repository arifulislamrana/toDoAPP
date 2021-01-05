<?php
namespace App\Http\Controllers;

use \App\Models\Task;
use \App\Repository\TaskRepository;
use \Illuminate\Support\Facades\Auth;
use \Illuminate\Http\Request;

class TaskController extends Controller{

    private $taskRepository;
    public function __construct(TaskRepository $taskRepository){

        $this->middleware('auth');
        $this->taskRepository = $taskRepository;
    }

    public function list()
    {
        $tasks = $this->taskRepository->getTasksOfCurrentUser();

        return view('tasks.list', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function save(\Illuminate\Http\Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5|max:255',
            'description' => 'nullable|string',
            'end_time' => 'required|after:today'
        ]);
        $savedTask = $this->taskRepository->createTask($request->except('_token'));
        if ($savedTask) {
            return redirect( Route('task.all'));
        } else {
            return view('404');
        }
    }

    public function delete($id)
    {
        $this->taskRepository->deleteTaskById($id);
        return redirect()->back();
    }

    public function edit($id)
    {
        return view('tasks.edit',
         ['task'=>$this->taskRepository->getTaskById($id)]);
    }

    public function update($taskId, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5|max:255',
            'description' => 'nullable|string',
            'end_time' => 'required|after:today'
        ]);

        $task = $this->taskRepository->saveTask($taskId, $request->except('_token'));

        if ($task) {
            return redirect( Route('task.all'));
        } else {
            return view('404');
        }
        
    }

    public function complete($taskId)
    {
        $task = $this->taskRepository->saveTask($taskId, [
            'status' => config('status.completed')
        ]);
        if ($task) {
            return redirect(route('task.all'));
        } else {
            return view('404');
        }
    }
    

}

?>