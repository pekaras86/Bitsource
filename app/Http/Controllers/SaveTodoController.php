<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SaveTodoController extends Controller
{
    function saveTodoList(Request $request) {

    	// πιάσε τα tasks
    	$toDo        = $request->get('toDo');
    	$completed   = $request->get('completed');

    	// user primary key
    	$user_primary_key = \Auth::user()->id;

    	// έλεγξε εάν υπάρχει χρήστης με το πάκω κλειδί που έχει todolist 
    	$user_todolist = \App\Todolist::where('uId', '=', $user_primary_key)->first();
		

		if ($user_todolist == null) {  // εάν δεν έχει todolist
		  
		  $todolist = new \App\Todolist(array(  // δημιούργησε todolist
            'uId'  => $user_primary_key
          ));

          $todolist->save();

          // αποθήκευσε τα todos
          $countToDos = count($toDo);

          for ($i=0; $i<$countToDos; $i++) {
            
            $todo = new \App\Todo(array(  // δημιούργησε todolist
              'tdId'  => $todolist->id,
              'task'  => $toDo[$i]
            ));

            $todo->save();
          
          }

          //αποθήκευσε τα completed
          $countCompleted = count($completed);

          for ($i=0; $i<$countCompleted; $i++) {
            
            $com = new \App\Complete(array(  // δημιούργησε todolist
              'tdId'  => $todolist->id,
              'task'  => $completed[$i]
            ));

            $com->save();
          
          }

		
		} else {  // εάν έχει todolist
		  
		  $todolist_id = $user_todolist->id;
           
           // delete τα παλιά tasks
		  \DB::table('todos')->where('tdId', '=', $todolist_id)->delete();
		  \DB::table('completes')->where('tdId', '=', $todolist_id)->delete();

		  // αποθήκευσε τα todos
          $countToDos = count($toDo);

          for ($i=0; $i<$countToDos; $i++) {
            
            $todo = new \App\Todo(array(  // δημιούργησε todolist
              'tdId'  => $todolist_id,
              'task'  => $toDo[$i]
            ));

            $todo->save();
          
          }

          //αποθήκευσε τα completed
          $countCompleted = count($completed);

          for ($i=0; $i<$countCompleted; $i++) {
            
            $com = new \App\Complete(array(  // δημιούργησε todolist
              'tdId'  => $todolist_id,
              'task'  => $completed[$i]
            ));

            $com->save();
          
          }
		  
		
		}
    	
    	
        


    	//return response('');
    	//return view('home')->with('$user_todolist',$user_todolist);

    }
}
