<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function tasks() {
    	return $this->hasMany('App\Task');
    }

    public function reviews() {
    	return $this->belongsToMany('App\Freelancer');
    }
}
