<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $fillable = [
        'user_id','title','shortlink','content','status','status_comment','image','categorypost_id','date_fa','time_fa'
    ];
}
