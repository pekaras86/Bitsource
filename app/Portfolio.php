<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'pId', 'pLink','pDescription',
    ];

    public function profile() {
        return $this->belongsTo('App\Profile');
    }
}
