<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Task;

class Tasks extends Controller
{
    

    public function create(TaskRequest $request)
    {
    	$task = Task::create($request->only(["task", "priority"]));

    	return $task;
    }

    public function list()
    {
    	return Task::all();
    }

    public function update(TaskRequest $request, Task $task)
    {
    	
    	$data = $request->only(["task", "priority"]);

    	$task->fill($data)->save();

    	return $task;
    }


    public function delete(Task $task)
    {
    	$task->delete();

    	return response(null, 204);
    }

    // public function complete(Task $task)
    // {
    // 	$task->patch("complete", 1)
    // }
}
