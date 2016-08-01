<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complete extends Model
{
    protected $fillable = [
        'tdId', 'task',
    ];

    public function todolist()
    {
        return $this->belongsTo('App\Todolist', 'tdId');
    }
}
