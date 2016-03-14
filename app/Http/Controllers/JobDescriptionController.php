<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class JobDescriptionController extends Controller
{
    function show() {
    	return view("jobs.job_description");
    }
}
