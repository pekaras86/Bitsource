<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserFormRequest;

use App\Profile;
use App\Portfolio;
use App\User;
use App\Skill;


class UserProfileController extends Controller
{   
    public function __construct()
    {   // το middleware 'auth', θα εφαρμοστεί σε όλές τις μεθόδους του controller,
        // εκτός απο τις index() και show()
        $this->middleware('auth', ['except' => ['show'], ['index']]);
    }
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
        return view('profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        // Save avatar 
        if($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $imageName = time() . '-' . $avatar->getClientOriginalName();
            $avatarPath = $request->file('avatar')->move(
                base_path() . '/public/images/avatars/', $imageName);
        } else {
            $avatarPath = base_path() . '/public/images/avatars/avatar';
            $imageName = 'avatar.png';
        }
        
        // Save input fields
        $title       = $request->get('title');
        $salary      = $request->get('salary');
        $telephone   = $request->get('telephone');
        $location    = $request->get('location');
        $description = $request->get('description');
        $category    = $request->get('category');

        // Create profile record
        $profile = new \App\Profile(array(
            'pAvatar'       => $imageName,
            'pSalary'       => $salary,
            'pTelephone'    => $telephone,
            'pLocation'     => $location,
            'pTitle'        => $title,
            'pCategory'     => $category,
            'pDescription'  => $description,
            'uId'           => \Auth::user()->id
        ));
        
        $profile->save();

        // Primary key of the user 
        $user_primary    = \Auth::user()->id;
         // Primary key of the profile
        $profile_primary = \DB::table('profiles')->where('uId',$user_primary)->value('id');


        // Portfolio links and descriptions
        $linksArray = $request->get('portLink');
        $descArray  = $request->get('portDesc');
        $countDescs = count($descArray);  // metritis portfolio


        // Create Portfolio records
        for( $i=0; $i < $countDescs; $i++ ) {
        
            $portfolio = new \App\Portfolio(array(
                'pId'           => $profile_primary,
                'pLink'         => $linksArray[$i],
                'pDescription'  => $descArray[$i]  
            ));
            
            $portfolio->save();
        
        } // end for

        
        // Skills
        $tags      = $request->get('tags');  //pare ta skills tags
        $new_tags  = json_decode($tags, true);  //kanta decode
        $countTags = count($new_tags);  // metritis skills
        
        
        // Insert skills in pivot table (profile_skill)
        for ($i=0; $i<$countTags; $i++) {

          $skillId  = \DB::table('skills')->where('sName', $new_tags[$i])->value('id');
          $profiles = Profile::find($profile_primary);
          $profiles->skills()->attach($skillId);
        
        } 


        // Create records for freelancer/employee/both
        /*
        if ($category == 'freelancer') {
            
            $createFreelancer = new \App\Freelancer(array(
              'pId' => $profile_primary
            ));

            $createFreelancer->save();

        } elseif ($category == 'employee') {
            
            $createEmployee = new \App\Employee(array(
              'pId' => $profile_primary
            ));

            $createEmployee->save();

        } else {
            
            $createFreelancer = new \App\Freelancer(array(
              'pId' => $profile_primary
            ));

           $createFreelancer->save();

            $createEmployee = new \App\Employee(array(
              'pId' => $profile_primary
            ));

            $createEmployee->save();
        }
        */

        $createFreelancer = new \App\Freelancer(array(
              'pId' => $profile_primary
            ));

           $createFreelancer->save();

            $createEmployee = new \App\Employee(array(
              'pId' => $profile_primary
            ));

            $createEmployee->save();

        // Redirect
        return redirect()->route('profile.show', [$user_primary]);
        
    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   


        $user       = \App\User::find($id);    // epelekse ton profile owner apo ton pinaka users
        $profile_id = $user->profile->id;      // apothikefse to profile id tou
        
        
        if($user->profile->pCategory === 'freelancer'){
            $freelancer_comments   = \DB::table('comments')    //retrieve ta comments tou profileOwner 
                                  ->join('profiles', 'profiles.id', '=', 'comments.reviewer')
                                  ->join('users', 'users.id', '=', 'profiles.uId')
                                  ->where('profileOwner', '=', $profile_id)
                                  ->where('userType', '=', 1)
                                  ->get();

            $count_freelancer_comments = count($freelancer_comments);  //synolo freelancer comments

            
            $sumFreeRating = 0;  //athroisma rating
            foreach($freelancer_comments as $freelancer_comment) {
              $sumFreeRating = $sumFreeRating + $freelancer_comment->userRating;
            }

            
            if($count_freelancer_comments > 0) {
            //mesos oros ratings
            $avgFreeRating = $sumFreeRating / $count_freelancer_comments;
            $avgFreeRating = number_format((float)$avgFreeRating, 1, '.', '');
            } else {
              $avgFreeRating = 0;
            }

             //return response($avgFreeRating);
            return view('profiles.show')->with('user', $user)->with('freelancer_comments', $freelancer_comments)->with('count_freelancer_comments', $count_freelancer_comments)->with('avgFreeRating', $avgFreeRating);
        
        } elseif ($user->profile->pCategory === 'employee') {
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

            
            if($count_employee_comments >0){
            //mesos oros ratings
            $avgEmpRating = $sumEmpRating / $count_employee_comments;
            $avgEmpRating = number_format((float)$avgEmpRating, 1, '.', '');
            }else{
              $avgEmpRating = 0;
            }



            return view('profiles.show')->with('user', $user)->with('employee_comments', $employee_comments)->with('count_employee_comments', $count_employee_comments)->with('avgEmpRating', $avgEmpRating);

        } else {
            
          $freelancer_comments   = \DB::table('comments')    //retrieve ta comments tou profileOwner 
                                  ->join('profiles', 'profiles.id', '=', 'comments.reviewer')
                                  ->join('users', 'users.id', '=', 'profiles.uId')
                                  ->where('profileOwner', '=', $profile_id)
                                  ->where('userType', '=', 1)
                                  ->get();

          $count_freelancer_comments = count($freelancer_comments);  //synolo freelancer comments

          $sumFreeRating = 0;  //athroisma rating
            foreach($freelancer_comments as $freelancer_comment) {
              $sumFreeRating = $sumFreeRating + $freelancer_comment->userRating;
            }

            
            
            if($count_freelancer_comments>0){
            //mesos oros ratings
            $avgFreeRating = $sumFreeRating / $count_freelancer_comments;
            $avgFreeRating = number_format((float)$avgFreeRating, 1, '.', '');
            }else{
             $avgFreeRating = 0;
            }
          


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

            
            
            if($count_employee_comments>0) {
            //mesos oros ratings
            $avgEmpRating = $sumEmpRating / $count_employee_comments;
            $avgEmpRating = number_format((float)$avgEmpRating, 1, '.', '');
            } else {
              $avgEmpRating = 0;
            }




            return view('profiles.show')->with('user', $user)->with('employee_comments', $employee_comments)->with('freelancer_comments', $freelancer_comments)->with('count_employee_comments', $count_employee_comments)->with('count_freelancer_comments', $count_freelancer_comments)->with('avgEmpRating', $avgEmpRating)->with('avgFreeRating', $avgFreeRating);

        }
    } //end function show

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(\Auth::user()->id != $id) {
            return view('home');
        }

        $user = \App\User::find($id);
        return view('profiles.edit')->with('user',$user);
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

         // Primary key of the user 
        $user_primary    = \Auth::user()->id;
         // Primary key of the profile
        $profile_primary = \DB::table('profiles')->where('uId',$user_primary)->value('id');


        // Piase tis times apo tis formes pou einai na ginoun update
        $location    = $request->get('location');
        $telephone   = $request->get('telephone');
        $description = $request->get('description');
        $salary      = $request->get('salary');
        $title       = $request->get('title');
        $category    = $request->get('category');
        
        if($request->hasFile('avatar')) {
          $avatar = $request->file('avatar');
          $imageName = time() . '-' . $avatar->getClientOriginalName();
          $avatarPath = $request->file('avatar')->move(
                base_path() . '/public/images/avatars/', $imageName);
        } else {
          $imageName = \Auth::user()->profile->pAvatar;
        }

        $linksArray = $request->get('portLink');
        $descArray  = $request->get('portDesc');
        $countDescs = count($descArray);  // metritis portfolio

         // apothikefsi 
         \DB::table('profiles')
            ->where('id', $profile_primary)
            ->update(['pSalary'      => $salary,
                      'pLocation'    => $location,
                      'pTelephone'   => $telephone,
                      'pDescription' => $description,
                      'pTitle'       => $title,
                      'pAvatar'      => $imageName,
                      'pCategory'    => $category,
                      ]);

          \DB::table('portfolios')->where('pId', '=', $profile_primary)->delete(); //svinw to palio portfolio
          
          // Create Portfolio records
        for( $i=0; $i < $countDescs; $i++ ) {
        
            $portfolio = new \App\Portfolio(array(
                'pId'           => $profile_primary,
                'pLink'         => $linksArray[$i],
                'pDescription'  => $descArray[$i]  
            ));
            
            $portfolio->save();
        
        } // end for


        //insert skills
        \DB::table('profile_skill')->where('pId', '=', $profile_primary)->delete(); //svinw to palio portfolio
        
        $tags      = $request->get('tags');  //pare ta skills tags
        $new_tags  = json_decode($tags, true);  //kanta decode
        $countTags = count($new_tags);  // metritis skills
        
        
        // Insert skills in pivot table (profile_skill)
        for ($i=0; $i<$countTags; $i++) {

          $skillId = \DB::table('skills')->where('sName', $new_tags[$i])->value('id');
          $profiles = Profile::find($profile_primary);
          $profiles->skills()->attach($skillId);
        
        } 

        return redirect()->route('profile.show', [$user_primary]);
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
