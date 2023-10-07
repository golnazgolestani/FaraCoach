<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category_post extends Model
{
    protected $fillable = [
        'category', 'shortlink','status','user_id','date_fa','time_fa'
    ];
}
