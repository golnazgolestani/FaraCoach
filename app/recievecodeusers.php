<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class recievecodeusers extends Model
{
    protected $fillable=[
        'user_id','code','type','date_fa','time_fa',
    ];
}
