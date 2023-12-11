<?php

use Illuminate\Support\Facades\Route;
use Mudassarali964\Todolist\Controllers\TaskController;

Route::resource('tasks', TaskController::class);


