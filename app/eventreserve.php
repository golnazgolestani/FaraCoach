<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class eventreserve extends Model
{
    protected $fillable=[
        'user_id','event_id','status','date_fa','time_fa'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
