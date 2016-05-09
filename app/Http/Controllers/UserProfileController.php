<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserFormRequest;

use App\Profile;
use App\Portfolio;


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
        
        /*
        // Save avatar 
        if($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $imageName = time() . '-' . $avatar->getClientOriginalName();
            $avatarPath = $request->file('avatar')->move(
                base_path() . '/public/images/avatars/', $imageName);
        } else {
            $avatarPath = base_path() . '/public/images/avatars/avatar';
        }
 

        
        // Create profile and save personal data
        $profile = new \App\Profile(array(
            'pAvatar'       => $avatarPath,
            'pSalary'       => $request->get('salary'),
            'pTelephone'    => $request->get('telephone'),
            'pSkills'       => $request->get('skills'),
            'pLocation'     => $request->get('location'),
            'pTitle'        => $request->get('title'),
            'pCategory'     => $request->get('category'),
            'pDescription'  => $request->get('description'),
            'uId'           => \Auth::user()->id
        ));
        
        $profile->save();   
        


         // Primary key of the user 
        $user_primary    = \Auth::user()->id;
         // Primary key of the profile
        $profile_primary = \DB::table('profiles')->where('uId',$user_primary)->value('id');
        */
        
        /*
        $title       = $request->title;
        $salary      = $request->salary;
        $telephone   = $request->telephone;
        $skills      = $request->skills;
        $location    = $request->location;
        $description = $request->description;
        $category    = $request->category;
        */


        $avatar = $request->file('avatar');
            $imageName = time() . '-' . $avatar->getClientOriginalName();
            $avatarPath = $request->file('avatar')->move(
                base_path() . '/public/images/avatars/', $imageName);
        


        /*
         // Portfolio Links (via Ajax)
        $linksArray = $request->newLink;  
         // Portfolio Descriptions (via Ajax)
        $descArray  = $request->newDesc;  
         //Plithos Portfolios
        $countDescs = count($descArray);  
        */
         /*
         // Create Portfolio records
        for( $i=0; $i < $countDescs; $i++ ) {
        
            $portfolio = new \App\Portfolio(array(
                'pId'           => $profile_primary,
                'pLink'         => $linksArray[0],
                'pDescription'  => $descArray[0]  
            ));
            
            $portfolio->save();
        
        } // end for
        */
        
        
        // Redirect to profile page
        return \Redirect::route('profile.create');
        //return response($avatarPath);
        
    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
