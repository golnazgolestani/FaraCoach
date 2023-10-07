<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_type extends Model
{
    protected $fillable=[
        'type','code','status'
    ];
}
