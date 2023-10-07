<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    protected $fillable=[
        'user_id','post_id','type','date_fa','time_fa',
    ];
}
