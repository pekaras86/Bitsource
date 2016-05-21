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
}
