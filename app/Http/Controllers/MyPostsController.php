<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Task;

class MyPostsController extends Controller
{
    public function show() {
        
        if(\Auth::user()->profile->pCategory == 'employee') {
          
          // employee id
          $eId = \Auth::user()->profile->employee->id;

          // collect the tasks with the above $eId 
          $tasks  = \App\Task::where('eId', $eId)->get();
          $ads    = \App\Ad::where('eId', $eId)->get(); 
          
          return view('myposts.show')->with('tasks',$tasks)
                                     ->with('ads', $ads);	
        
        } elseif (\Auth::user()->profile->pCategory == 'freelancer') {

          // freelancer id
          $fId  = \Auth::user()->profile->freelancer->id;
          
          $bids  = \App\Task::where('fId', $fId)->get();
          
          return view('myposts.show')->with('bids', $bids);
        
        } else {
          
          // employee id
          $eId = \Auth::user()->profile->employee->id;

          // freelancer id
          $fId  = \Auth::user()->profile->freelancer->id;

          // collect the tasks with the above $eId 
          $tasks  = \App\Task::where('eId', $eId)->get();
          
          // collect the ads with the above $eId
          $ads    = \App\Ad::where('eId', $eId)->get();

          //collect the bids with the above fId
          $bids  = \App\Task::where('fId', $fId)->get();

          return view('myposts.show')->with('tasks',$tasks)
                                     ->with('ads', $ads)
                                     ->with('bids', $bids);
          //return response($ads);
        
        }
        

    	
    }
}
