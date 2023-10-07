<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class scholarship_payment extends Model
{
    protected $fillable=[
        'user_id','course_id','fi','loan','score','fi_final','pre_payment','remaining','date_fa','time_fa','type_payment'
    ];
}
