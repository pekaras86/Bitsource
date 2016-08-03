<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class JobsListController extends Controller
{
    function show() {
        
        $jobs = \App\Ad::all();

    	return view("lists.jobs_list")->with('jobs', $jobs);
    }
}
