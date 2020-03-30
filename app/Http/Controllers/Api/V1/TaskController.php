<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\TaskResource;
use App\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::when(request()->input('status'), function ($query) {
            $query->where('status_id', request()->input('status'));
        })->orderBy('due_date', request()->input('sorting'))->get();

        return new TaskResource($tasks);
    }

    public function statusUpdate()
    {
        $task = Task::findOrFail(request()->input('taskId'));
        $task->update([
            'status_id' => request()->input('statusId'),
        ]);

        return response()->json(['success' => 'success'], 200);
    }
}
