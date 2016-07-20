<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $fillable = [
        'tTitle', 'tDescription','tBudget', 'tEnds', 'eId'
    ];

    public function employee() {
    	return $this->belongsTo('App\Employee', 'eId');
    }
    
    public function skills()
    {
    	return $this->belongsToMany('App\Skill', 'skill_task', 'tId', 'sId');
    }

    public function freelancers() {
        return $this->belongsToMany('App\Freelancer', 'freelancer_task', 'tId', 'fId');
    }

    public function winner()
    {
        return $this->belongsTo('App\Freelancer', 'fId');
    }
    
}
