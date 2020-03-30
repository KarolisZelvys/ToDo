<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'Api\V1\UserController@login');
Route::post('register', 'Api\V1\UserController@register');

Route::get('tasks', 'Api\V1\TaskController@index')->name('api.front.tasks');
Route::get('taskStatusUpdate', 'Api\V1\TaskController@statusUpdate');
Route::get('statuses', 'Api\V1\StatusController@index')->name('api.front.statuses');



