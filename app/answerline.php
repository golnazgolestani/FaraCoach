<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class answerline extends Model
{
    protected $fillable=[
      'user_id','keyword','user_type','problemfollowup_id','followup_comment','text_message'
    ];

    public function userType()
    {
        return $this->belongsTo('App\user_type','user_type','code');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function problemFollowup()
    {
        return $this->belongsTo('App\problemfollowup','problemfollowup_id','id');
    }
}
