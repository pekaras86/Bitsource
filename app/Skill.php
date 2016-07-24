<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'sName', 
    ];


    public function profiles()
    {
        return $this->belongsToMany('App\Profile', 'profile_skill', 'sId', 'pId');
    }

    public function tasks()
    {
    	return $this->belongsToMany('App\Task', 'skill_task', 'sId', 'tId');
    }

    public function ads() 
    {
        return $this->belongsToMany('App\Ad', 'ad_skill', 'sId', 'aId');
    }
}
