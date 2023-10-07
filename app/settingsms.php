<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class settingsms extends Model
{
    protected $fillable = [
        'comment','type','status'
    ];
}
