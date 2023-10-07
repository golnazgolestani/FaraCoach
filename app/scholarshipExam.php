<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class scholarshipExam extends Model
{
    protected $fillable=[
        'user_id','result','score','date_fa','time_fa'
    ];
}
