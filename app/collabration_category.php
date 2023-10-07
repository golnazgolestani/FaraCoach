<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class collabration_category extends Model
{
    protected $fillable=[
        'category','status'
    ];

    public function collabration_details()
    {
        return $this->hasMany('App\collabration_details','collabration_categories_id','id');
    }
}
