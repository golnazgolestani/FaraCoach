<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category_gettingknow extends Model
{
    protected $fillable=[
        'category','status','parent_id'
    ];

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function parent()
    {
        return $this->belongsTo('App\category_gettingknow','parent_id','id');
    }

    public function child_lists()
    {
        return $this->hasMany('App\category_gettingknow','parent_id','id');
    }

}
