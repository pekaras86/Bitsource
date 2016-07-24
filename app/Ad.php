<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'eId', 'adTitle', 'adCompany', 'adType', 'adCity', 
        'adStudies', 'adDesc', 'adProvisions', 'adEmail', 'adWebsite', 
    ];
    
    public function skills() 
    {
        return $this->belongsToMany('App\Skill', 'ad_skill', 'aId', 'sId');
    }

    public function employee() {
        return $this->belongsTo('App\Employee', 'eId');
    }
    
}
