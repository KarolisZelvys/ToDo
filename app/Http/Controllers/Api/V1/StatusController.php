<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\StatusResource;
use App\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = Status::all();

        return new StatusResource($statuses);
    }
}
