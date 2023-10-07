<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class type_coach extends Model
{
    protected $fillable=[
        'type','shortlink','coefficient','status'
    ];
}
