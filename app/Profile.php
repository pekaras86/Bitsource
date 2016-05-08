<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'uId', 'pLocation', 'pCategory', 'pTitle', 'pDescription', 
        'pSkills', 'pSalary', 'pPorfolio', 'pAvatar', 
    ];

    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function portfolios() {
        return $this->hasMany('App\Portfolio');
    }
}
