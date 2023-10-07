<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class coursetype extends Model
{
    protected $fillable = [
        'type', 'shortlink','status'
    ];

    public function getRouteKeyName()
    {
        return 'shortlink';
    }
}
