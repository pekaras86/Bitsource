<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Task;

class OfferWinnerController extends Controller
{
    function setWinner(Request $request) {
    	
        // πάρε το ajax από το task page.
    	$offerWinner = $request->get('winner'); // νικητής προσφοράς (user id) 
    	$taskId      = $request->get('taskId'); // το id του task
        $bestOffer   = $request->get('bestOffer');

    	// βρές τον user με το πιό πάνω id.
    	$user = \App\User::find($offerWinner);

    	// βρές το freelancer id του user
    	$freelancer_id = $user->profile->freelancer->id;

    	// βάλε το freelancer_id μέσα στο συγκεκριμένο task.
    	\DB::table('tasks')
            ->where('id', $taskId)
            ->update(['fId' => $freelancer_id, 'tBestOffer' => $bestOffer]);

    	return response($bestOffer); 
    }
    
}
