<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserProfileController extends Controller
{
    function show() {
    	return view('users.user_profile');
    }
}
