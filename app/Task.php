<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function employee() {
    	return $this->belongsTo('App\Employee');
    }

    public function awardedTo() {
    	return $this->belongsTo('App\Freelancer');
    }

    public function bids() {
    	return $this->belongsToMany('App\Freelancer');
    }
}
