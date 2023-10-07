<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class psychological extends Model
{
    protected $fillable=[
        'user_id','result'
    ];

    public function User()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }


}
