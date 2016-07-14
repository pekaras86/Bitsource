<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    protected $fillable = [
        'pId',
    ];

    public function tasks() {
    	return $this->hasMany('App\Task');
    }

    public function freelancers() {
    	return $this->belongsToMany('App\Freelancer', 'employee_freelancer', 'eId', 'fId');
    }

    public function profile() {
        return $this->belongsTo('App\Profile', 'pId', 'id');
    }
}
