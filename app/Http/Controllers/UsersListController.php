<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Profile;  

class UsersListController extends Controller
{
    function show() {
    	
    	$users = User::all(); 
    	return view('lists.users_list')->with('users', $users);


    }
}


