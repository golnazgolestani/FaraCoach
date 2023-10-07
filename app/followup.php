<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class followup extends Model
{
    protected $fillable = [
        'user_id', 'insert_user_id','course_id', 'comment','problemfollowup_id','categoryfollowup_id','status_followups','nextfollowup_date_fa','sms','flag','date_fa','time_fa','datetime_fa','tags','talktime'
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function userType()
    {
        return $this->belongsTo('App\user_type','status_followups','code');
    }


    //نوع کیفیت مشتری و رنگ آن
    public function problemFollowup()
    {
        return $this->belongsTo('App\problemfollowup','problemfollowup_id','id');
    }

    public function courses()
    {
        return $this->hasMany('App\course','course_id',"id");
    }

    public function course()
    {
        return $this->belongsTo('App\course','course_id','id');
    }

    public function insertUser()
    {
        return $this->belongsTo('App\User','insert_user_id','id');
    }




}
