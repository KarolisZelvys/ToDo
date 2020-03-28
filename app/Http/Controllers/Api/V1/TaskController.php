<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\TaskResource;
use App\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
//        $user = Auth::findOrFail(8);
//        $tasks = $user->task()->get();

        dd(\Auth::guard('web')->user());

        return new TaskResource($tasks);
    }
}
