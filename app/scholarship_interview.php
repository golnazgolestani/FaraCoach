<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class scholarship_interview extends Model
{
    protected $fillable=[
        'user_id','level','type_holding','cooperation','motivation','ability','obligation','impact','score','description','insert_user_id','date_fa','time_fa','validity'
    ];
}
