<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class collabration_accept extends Model
{
    protected $fillable=[
        'user_id','value','count','count','calculate','expire','collabration_detail_id','description','status'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function collabration_details()
    {
        return $this->belongsTo('App\collabration_details','collabration_detail_id','id');
    }
}
