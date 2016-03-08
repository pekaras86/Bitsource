<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FreelancerProfileController extends Controller
{
    function show() {
    	return view('freelancers.freelancer_profile');
    }
}
