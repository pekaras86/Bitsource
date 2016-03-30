<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;  //Dilwnw panta ton controller me ton opoio tha synergazomai

class UsersListController extends Controller
{
    function show() {
    	return view('lists.users_list');
    	
    	//$freelancers = User::all();  //vale ta records olwn twn freelancers mesa sti metavliti $freelancers
    	//epestrepse to view users.users.list mazi me ti metavliti $freelancers
    	//return view('users.users_list')->with('freelancers', $freelancers);  

    }
}


