<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category_document extends Model
{
    protected $fillable=[
        'category','status'
    ];

    public function document()
    {
        return $this->hasMany('App\document');
    }

//    public function getRouteKeyName()
//    {
//        return 'category';
//    }
}
