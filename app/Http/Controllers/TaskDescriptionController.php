<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TaskDescriptionController extends Controller
{
    function show() {
    	return view("tasks.task_description");
    }
}
