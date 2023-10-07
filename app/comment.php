<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $fillable = [
        'user_id','post_id' ,'comment','status','type','date_fa','time_fa'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
