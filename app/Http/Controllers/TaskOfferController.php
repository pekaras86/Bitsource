<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Task;

class TaskOfferController extends Controller
{
    function setOffer(Request $request) {

    	$offerPrice   = $request->get('offerPrice');
    	$offerComment = $request->get('offerComment');
    	$userOffers   = $request->get('userOffers');
    	$taskId       = $request->get('taskId');

    	$task = \App\Task::find($taskId);
    	$task->bided()->attach($userOffers, ['mbBid' => $offerPrice, 'mbComment' => $offerComment]);


    	return response($taskId);

    }
    
}
