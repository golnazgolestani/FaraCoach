<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tweet extends Model
{
    protected $fillable = [
            'user_id','tweet','likes','status','date_fa','time_fa'
        ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
