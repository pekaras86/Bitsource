<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'uId', 'pLocation', 'pCategory', 'pTitle', 'pDescription', 
        'pSkills', 'pSalary', 'pPorfolio', 'pAvatar', 'pTelephone', 
    ];

    public function freelancer() {
        return $this->hasOne('App\Freelancer', 'pId');
    }

    public function employee() {
        return $this->hasOne('App\Employee', 'pId');
    }

    public function user() {
        return $this->belongsTo('App\User', 'uId', 'id');
    }

    public function portfolios() {
        return $this->hasMany('App\Portfolio', 'pId');
    }

    public function skills()
    {
        return $this->belongsToMany('App\Skill', 'profile_skill', 'pId', 'sId');
    }
}
