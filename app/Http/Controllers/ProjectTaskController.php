<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\TaskFormRequest;

use App\Task;
use App\Profile;
use App\User;
use App\Freelancer;

class ProjectTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('tasks.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskFormRequest $request)
    {
        
        // αποθήκευση 'task' στον πίνακα 'tasks'.
        $taskTitle       = $request->get('taskTitle');
        $taskDescription = $request->get('taskDescription');
        $taskBudget      = $request->get('taskBudget');
        $taskEnds        = $request->get('taskEnds');

        $task = new \App\Task(array(
            'tTitle'       => $taskTitle,
            'tDescription' => $taskDescription,
            'tBudget'      => $taskBudget,
            'tEnds'        => $taskEnds,
            'eId'          => \Auth::user()->profile->employee->id
        ));

        $task->save();


        // αποθήκευση στο pivot table 'skill_task'.
        $tags            = $request->get('tags');
        $decoded_tags    = json_decode($tags, true);
        $countTags       = count($decoded_tags);

        
        for ($i=0; $i<$countTags; $i++) {

          $skillId  = \DB::table('skills')->where('sName', $decoded_tags[$i])->value('id');
          $profiles = Task::find($task->id);
          $profiles->skills()->attach($skillId);
        
        } 

        $taskPrimary = $task->id;
        return redirect()->route('project_task.show', [$taskPrimary]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
       $task = \App\Task::find($id);
       
       $userFname = $task->employee->profile->user->uFname;
       $userLname = $task->employee->profile->user->uLname;

       $user_id = $task->employee->profile->user->id; 
       
       // rating δημιουργού του task.
       $profile_id = $task->employee->profile->id;

       $employee_comments   = \DB::table('comments')    //retrieve ta comments tou profileOwner 
                                  ->join('profiles', 'profiles.id', '=', 'comments.reviewer')
                                  ->join('users', 'users.id', '=', 'profiles.uId')
                                  ->where('profileOwner', '=', $profile_id)
                                  ->where('userType', '=', 2)
                                  ->get();

       $count_employee_comments = count($employee_comments);  //synolo employee comments

       $sumEmpRating = 0;  //athroisma rating
       foreach($employee_comments as $employee_comment) {
         $sumEmpRating = $sumEmpRating + $employee_comment->userRating;
       }
    
        if($count_employee_comments >0) {
          //mesos oros ratings
          $avgEmpRating = $sumEmpRating / $count_employee_comments;
          $avgEmpRating = number_format((float)$avgEmpRating, 1, '.', '');
        } else {
          $avgEmpRating = 0;
        }


        

       // προσφορές
       $task_comments   = \DB::table('freelancer_task')    //retrieve ta comments tou profileOwner 
                                  ->join('freelancers', 'freelancers.id', '=', 'freelancer_task.fId')
                                  ->join('profiles', 'profiles.id', '=', 'freelancers.pId')
                                  ->join('users', 'users.id', '=', 'profiles.uId')
                                  ->where('tId', '=', $id)
                                  ->get();



        
        $count_task_comments = count($task_comments);  //synolo task comments

        $sumTaskOffers = 0;  //athroisma rating
        foreach($task_comments as $task_comment) {
          $sumTaskOffers = $sumTaskOffers + $task_comment->mbBid;
        }


        if($count_task_comments > 0) {
            //mesos oros ratings
            $avgTaskOffers = $sumTaskOffers / $count_task_comments;
            $avgTaskOffers = number_format((float)$avgTaskOffers, 1, '.', '');
        } else {
             $avgTaskOffers = 0;
        }



         
    

        return view('tasks.show')->with('task', $task)  // plirofories tou task
                                 ->with('avgEmpRating', $avgEmpRating) // rating tou employee
                                 ->with('userFname', $userFname)  // onoma ergodoti
                                 ->with('userLname', $userLname)  //epitheto ergodoti
                                 ->with('user_id', $user_id)  // to user id tou employee
                                 ->with('task_comments', $task_comments )  // ta offers
                                 ->with('count_task_comments', $count_task_comments)  // synolika offers
                                 ->with('avgTaskOffers', $avgTaskOffers);  // mesos oros prosforwn
                                 
       
       //return response($task_comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = \App\Task::find($id);

        return view('tasks.edit')->with('task', $task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // κάνε update το task.
        $taskTitle       = $request->get('taskTitle');
        $taskDescription = $request->get('taskDescription');
        $taskBudget      = $request->get('taskBudget');
        $taskEnds        = $request->get('taskEnds');


        \DB::table('tasks')
            ->where('id', $id)
            ->update(['tTitle' => $taskTitle, 'tDescription' => $taskDescription, 'tBudget' => $taskBudget, 'tEnds' => $taskEnds]);

        // svise ta palia skills
        \DB::table('skill_task')->where('tId', '=', $id)->delete(); 

        //pare ta nea skills
        $tags            = $request->get('tags');
        $decoded_tags    = json_decode($tags, true);
        $countTags       = count($decoded_tags);

        
        for ($i=0; $i<$countTags; $i++) {
          $skillId  = \DB::table('skills')->where('sName', $decoded_tags[$i])->value('id');
          $profiles = Task::find($id);
          $profiles->skills()->attach($skillId);
        } 
    
    
        return redirect()->route('project_task.show', [$id]);
        //return response($countTags);
    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
