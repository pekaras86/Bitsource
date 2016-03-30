<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TasksListController extends Controller
{
    function show() {
    	return view("tasks.tasks_list");
    }
}
