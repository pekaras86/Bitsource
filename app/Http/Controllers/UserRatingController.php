<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\RateRequest;

use App\Freelancer;
use App\Comment;

class UserRatingController extends Controller
{
    function setRating(RateRequest $request) {
    	
    	// pare ta stoixeia tis aksiologisis me ajax
    	$revTitle = $request->get('revTitle');   // titlos ergou
    	$revCom   = $request->get('revCom');     // sxolio ergou
    	$rating   = $request->get('rating');     // rating ergou
    	$userCom  = $request->get('userComId');  // the user that comments ( freelancer or employee id )
    	$userProf = $request->get('userProf');   // the user with the profile ( freelancer or employee id )
    	$userType = $request->get('usCat');      // katigoria xristi profile ( 1:freelancer, 2:employee )
        
    	
    	// kai valta sto table comments
        \DB::table('comments')->insert(
          [
	           'profileOwner' => $userProf,
	           'reviewer'     => $userCom,
	           'rTitle'       => $revTitle,
	           'rComment'     => $revCom,
	           'userType'     => $userType,
	           'userRating'   => $rating
           ]
        );
        

        //$freelancer = \App\Freelancer::find($userCom);

        //$freelancer->employees()->attach($userProf);
        
    	return response($userCom);
        
    }
}
