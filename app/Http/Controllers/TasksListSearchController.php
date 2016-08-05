<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class TasksListSearchController extends Controller
{
    public function show(Request $request){
        
        //πιάσε τα tags απο το search
        $tags      = $request->get('tags');  
        $new_tags  = json_decode($tags, true);  
        $countTags = count($new_tags);

        // εάν υπάρχουν tags
        if($countTags == 0) {
          
            return view("lists.tasks_list")->with('tasks_table', 'Den')
		    	                           ->with('tasks_search', 1);

        } else {
            
	        //στον πίνακα "$skills_id_array" πέρνα τα id από τα skills που ζήτησε ο χρήστης
	        for($i=0; $i<$countTags; $i++) {
	            $skill_id = \DB::table('skills')->where('sName', '=', $new_tags[$i])->value('id');
	            $skills_id_array[$i] = $skill_id;
	        }

	        //απο το table "skill_task" παρε τα records που εχουν τα πάνω skill_id (sId).
	        $count_skills_id_array = count($skills_id_array);
	        $skill_task = \DB::table('skill_task')->whereIn('sId', $skills_id_array)->get();

	        // apo ta panw records toy pinaka "skill_task" krata mono ta "tId".
	        $skill_task_collection = collect($skill_task);
	        $tIds = $skill_task_collection->pluck('tId');

	        // apo ton panw pinaka me ta tIds vgale tis dyploegrafes
	        $tIds_collection = collect($tIds);
	        $unique_tIds = $tIds_collection->unique();
	        //$unique_tIds->values()->all()[$i]

	        //trava apo to table tasks ta records me ta panw tIds
	        $count_unique_tIds = count($unique_tIds);
	        if($count_unique_tIds == 0) {
	        	return view("lists.tasks_list")->with('tasks_table', 'Den')
	    	                                   ->with('tasks_search', 1);
		    } else {
		        for ($i=0; $i<$count_unique_tIds; $i++) { 
		        	$task = \App\Task::where('id', $unique_tIds->values()->all()[$i])->get()->first();
		        	$tasks_table[$i] = $task; 
		        }

	            $tasks_search = 1;

	            return view("lists.tasks_list")->with('tasks_table', $tasks_table)
	    	                                   ->with('tasks_search', $tasks_search);
	        }                   
        } //end else
    }
}
