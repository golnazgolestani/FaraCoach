<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    protected $fillable = [
        'tag', 'status','category_tags_id'
    ];
}
