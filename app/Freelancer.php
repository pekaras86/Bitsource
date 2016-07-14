<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{

    protected $fillable = [
        'pId',
    ];

    public function awards() {
    	return $this->hasMany('App\Task');
    }

    public function employees() {
    	return $this->belongsToMany('App\Employee', 'employee_freelancer', 'fId', 'eId');
    }

    public function bids() {
    	return $this->belongsToMany('App\Task');
    }

    public function profile() {
        return $this->belongsTo('App\Profile', 'pId', 'id');
    }
}
