<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class assessment extends Model
{
    protected $fillable=[
        'user_id','score','subject'
    ];
}
