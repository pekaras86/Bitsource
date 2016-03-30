<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class JobsListController extends Controller
{
    function show() {
    	return view("lists.jobs_list");
    }
}
