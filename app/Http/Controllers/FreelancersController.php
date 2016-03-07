<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FreelancersController extends Controller
{
    function show() {
    	return view('freelancers.freelancers');
    }
}
