<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category_coach extends Model
{
    protected $fillable = [
        'category', 'shortlink','status'
    ];


}
