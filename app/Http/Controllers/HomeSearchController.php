<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class HomeSearchController extends Controller
{

    public function index() {
    	return view('search');
    }
}
