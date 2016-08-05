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

        $profiles = \App\Profile::where('pCategory', '=', 'freelancer')
                              ->orWhere('pCategory', '=', 'both')
                              ->get();
                                  
        $profiles_search = 0;

        return view('lists.users_list')->with('profiles', $profiles)
                                       ->with('profiles_search', $profiles_search);
    }
}


