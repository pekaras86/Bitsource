<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * prin to request proxorisei stin index(), 
     * tha perasei elegxo apo to 'auth' middleware.
     * ean o user exei kanei authorization, 
     * tha perasei stin index(), opou tha ton stilei to home.
     * se antitheti periptwsi o user tha ginei redirect
     * se kapoio allo view (search)
    */
    public function __construct()
    {
       $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_todolist_id = \Auth::user()->todolist->id;

        $todos = \App\Todolist::find($user_todolist_id)->todos;
        $completes = \App\Todolist::find($user_todolist_id)->completed;

        //return response($todos);
        return view('home')->with('todos', $todos)
                           ->with('completes', $completes);

    }
}
