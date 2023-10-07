<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sms extends Model
{
    protected $fillable = [
        'insert_user_id','recieve_user','comment','date_fa','time_fa','type','code'
    ];
}
