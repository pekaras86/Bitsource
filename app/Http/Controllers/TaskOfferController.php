<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Task;

class TaskOfferController extends Controller
{
    function setOffer(Request $request) {

    	$offerPrice   = $request->get('offerPrice');  // τιμή του offer
    	$offerComment = $request->get('offerComment'); // σχόλιο του offer
    	$userOffers   = $request->get('userOffers'); // freelancer id του χρήστη που κάνει την προσφορά
    	$taskId       = $request->get('taskId');  // το task id

    	$task = \App\Task::find($taskId);
    	$task->freelancers()->attach($userOffers, ['mbBid' => $offerPrice, 'mbComment' => $offerComment]);


    	return response($taskId);

    }
    
}
