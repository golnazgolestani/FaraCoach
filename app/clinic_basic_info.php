<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clinic_basic_info extends Model
{
    protected $fillable=[
        'title','parent_id','pic','description','status'
    ];

    public function speciality_infos()
    {
        return $this->hasMany('App\clinic_basic_info','parent_id','id');
    }

    public function coach_requests()
    {
        return $this->hasMany('App\coach_request','fk_orientation','id');
    }

    public function children()
    {
        return $this->hasMany('App\clinic_basic_info','parent_id','id');
    }

    public function parent()
    {
        return $this->belongsTo('App\clinic_basic_info','parent_id','id');
    }

    public function getRouteKeyName()
    {
        return "title";
    }
}
