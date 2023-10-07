<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
    protected $fillable=[
        'user_id','insert_user_id','notification','type','status','date_fa','time_fa'
    ];
}
