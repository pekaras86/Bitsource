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
    	
    	$profiles = \DB::table('profiles')->join('users', 'users.id', '=', 'profiles.uId')
    	                                  ->where('pCategory', '=', 'freelancer')
    	                                  ->orWhere('pCategory', '=', 'both')
    	                                  ->get();

    	
        
    	return view('lists.users_list')->with('profiles', $profiles);
        //return response($profiles);

    }
}


