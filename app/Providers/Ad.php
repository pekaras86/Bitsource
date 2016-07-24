<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'eId', 'adTitle', 'adCompany', 'adType', 'adCity', 
        'adStudies', 'adDesc', 'adProvisions', 'adEmail', 'adWebsite', 
    ];

    
}
