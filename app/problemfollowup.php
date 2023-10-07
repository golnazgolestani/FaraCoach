<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class problemfollowup extends Model
{
    protected $fillable = [
        'problem','status','color'
    ];
}
