<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;

class AboutController extends Controller
{
    public function create() {
    	return view('about.contact');
    }

    public function store(ContactFormRequest $request) {
    	return \Redirect::route('contact')
    	    ->with('message', 'Σας ευχαριστούμε για την επικοινωνία!');
    }

    
}
