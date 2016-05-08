<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TasksListController extends Controller
{
    public function show() {
    	return view("lists.tasks_list");
    }

    
}