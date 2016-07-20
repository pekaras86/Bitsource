<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{

    protected $fillable = [
        'pId',
    ];

    public function awards() {
    	return $this->hasMany('App\Task', 'fId');
    }

    public function employees() {
    	return $this->belongsToMany('App\Employee', 'employee_freelancer', 'fId', 'eId');
    }

    public function tasks() {
    	return $this->belongsToMany('App\Task', 'freelancer_task', 'fId', 'tId');
    }

    public function profile() {
        return $this->belongsTo('App\Profile', 'pId', 'id');
    }
}
