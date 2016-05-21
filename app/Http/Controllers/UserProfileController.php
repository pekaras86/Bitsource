<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserFormRequest;

use App\Profile;
use App\Portfolio;
use App\User;


class UserProfileController extends Controller
{   
    public function __construct()
    {   // το middleware 'auth', θα εφαρμοστεί σε όλές τις μεθόδους του controller,
        // εκτός απο τις index() και show()
        $this->middleware('auth', ['except' => ['index'], ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        return view('profiles.index');
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
        $descArray = $request->get('portDesc');
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

          $skillId = \DB::table('skills')->where('sName', $new_tags[$i])->value('id');
          $profiles = Profile::find($profile_primary);
          $profiles->skills()->attach($skillId);
        
        } 


        // Create records for freelancer/employee/both
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
        

        // Redirect
        return \Redirect::route('profile.show');

        
    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $skill = \App\Skill::find(1);
        return response($skill);
        //return view('profiles.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
