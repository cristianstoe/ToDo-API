<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post("create-user", "\App\Http\Controllers\UserController@createUser");

Route::post("user-login", "\App\Http\Controllers\UserController@userLogin");

Route::group(['middleware' => 'auth:api'], function () {
    Route::get("user-detail", "\App\Http\Controllers\UserController@userDetail");

    Route::post("create-task", "\App\Http\Controllers\TaskController@createTask");
    Route::get("tasks", "\App\Http\Controllers\TaskController@tasks");
    Route::get("task/{task_id}", "\App\Http\Controllers\TaskController@task");
    Route::delete("task/{task_id}", "\App\Http\Controllers\TaskController@deleteTask");
});

