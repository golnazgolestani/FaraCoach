<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    //
    protected $fillable=[
        'user_id','event','shortlink','event_text','description','fi','image','capacity','type','address','heading','contacts','faq','video','links','expire_date','start_date','end_date','start_time','end_time','duration','options','status','insert_user'
    ];


    public function getRouteKeyName()
    {
        return 'shortlink';
    }

    public function eventreserves()
    {
        return $this->hasMany('App\eventreserve','event_id','id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
