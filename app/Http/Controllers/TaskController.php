<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function store(Request $req)
    {
        $validatedData = $req->validate(['title' => 'required']);

        $task = Task::create([
            'title' => $validatedData['title'],
            'project_id' => $req->project_id
        ]);

        return $task->toJson();
    }

    public function markAsCompleted(Task $task)
    {
        $task->is_completed = true;
        $task->update();

        return response()->json('Task updated');
    }
}
