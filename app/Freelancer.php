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

    public function reviews() {
    	return $this->belongsToMany('App\Employee');
    }

    public function bids() {
    	return $this->belongsToMany('App\Task');
    }

    public function profile() {
        return $this->belongsTo('App\Profile', 'pId', 'id');
    }
}
