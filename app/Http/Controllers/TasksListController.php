<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Task;
use App\Employee;

class TasksListController extends Controller
{
    public function show() {

        $tasks = \App\Task::all();

    	return view("lists.tasks_list")->with('tasks', $tasks);
    	//return response($tasks);
    }

    
}