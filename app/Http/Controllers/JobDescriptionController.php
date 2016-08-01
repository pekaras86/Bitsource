<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AdRequest;

use App\Ad;
use App\Skill;

class JobDescriptionController extends Controller
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
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdRequest $request)
    {
        $job_title       = $request->get('job-title');
        $company_name    = $request->get('company-name');
        $job_type        = $request->get('job-type');
        $job_city        = $request->get('job-city');
        $education       = $request->get('education');
        $job_description = $request->get('job-description');
        $job_provisions  = $request->get('job-provisions');
        $job_website     = $request->get('job-website');
        $job_email       = $request->get('job-email'); 

        
        $ad = new \App\Ad(array(
            'adTitle'       => $job_title,
            'adCompany'     => $company_name,
            'adType'        => $job_type,
            'adCity'        => $job_city,
            'adStudies'     => $education,
            'adDesc'        => $job_description,
            'adProvisions'  => $job_provisions,
            'adWebsite'     => $job_website,
            'adEmail'       => $job_email,
            'eId'           => \Auth::user()->profile->employee->id
        ));
        
        $ad->save();


        // skills
        $tags            = $request->get('tags');
        $decoded_tags    = json_decode($tags, true);
        $countTags       = count($decoded_tags);

        for ($i=0; $i<$countTags; $i++) {
          $skillId  = \DB::table('skills')->where('sName', $decoded_tags[$i])->value('id');
          $profiles = Ad::find($ad->id);
          $profiles->skills()->attach($skillId);
        } 

        
        $adPrimary = $ad->id;
        return redirect()->route('job.show', [$adPrimary]);
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $ad = \App\Ad::find($id);

        if($ad == '') {
          return view('errors.404');
       }


        return view('jobs.show')->with('ad', $ad);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ad = \App\Ad::find($id);

        return view('jobs.edit')->with('ad', $ad);
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
        $job_title       = $request->get('job-title');
        $company_name    = $request->get('company-name');
        $job_type        = $request->get('job-type');
        $job_city        = $request->get('job-city');
        $education       = $request->get('education');
        $job_description = $request->get('job-description');
        $job_provisions  = $request->get('job-provisions');
        $job_website     = $request->get('job-website');
        $job_email       = $request->get('job-email'); 

        \DB::table('ads')
            ->where('id', $id)
            ->update(['adTitle'      => $job_title, 
                      'adCompany'    => $company_name, 
                      'adType'       => $job_type, 
                      'adCity'       => $job_city,
                      'adStudies'    => $education,
                      'adDesc'       => $job_description,
                      'adProvisions' => $job_provisions,
                      'adWebsite'    => $job_website,
                      'adEmail'      => $job_email ]);

        
        // svise ta palia skills
        \DB::table('ad_skill')->where('aId', '=', $id)->delete(); 

        //pare ta nea skills
        $tags            = $request->get('tags');
        $decoded_tags    = json_decode($tags, true);
        $countTags       = count($decoded_tags);

        for ($i=0; $i<$countTags; $i++) {
          $skillId  = \DB::table('skills')->where('sName', $decoded_tags[$i])->value('id');
          $profiles = Ad::find($id);
          $profiles->skills()->attach($skillId);
        } 

        return redirect()->route('job.show', [$id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\Ad::destroy($id);

        return redirect()->action('MyPostsController@show');
    }
}
