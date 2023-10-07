<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class homework extends Model
{
    protected $fillable=[
        'booking_id','text','user_id_send','homework_id_answer','attach','type','status','date_fa','time_fa'
    ];
}
