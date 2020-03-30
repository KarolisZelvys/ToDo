<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//@TODO sudeti route

Auth::routes();

Route::get('/', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/admin', function () {
    return view('admin/home');
})->name('admin.home')->middleware('is_admin');

Route::group(['prefix' => 'admin', 'middleware' => 'is_admin'], function () {
    Route::resource('users', 'UserController');
    Route::resource('statuses', 'StatusController');
    Route::resource('tasks', 'TaskController');
});
