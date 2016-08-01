<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    protected $fillable = [
        'uId',
    ];

    public function user() {
        return $this->belongsTo('App\User', 'uId', 'id');
    }

    public function todos() {
        return $this->hasMany('App\Todo', 'tdId');
    }

    public function completed() {
        return $this->hasMany('App\Complete', 'tdId');
    }
}
