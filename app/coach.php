<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class coach extends Model
{
    protected $fillable = [
        'user_id','education_background','researches','certificates','experience','skills','documents','count_meeting','customer_satisfaction','category','typecoach_id','change_customer','count_recommendation','fi','type_holding','address','online_platform','tel','today_meeting','status','introduction_discount','extra_presence','confirm_faracoach','student_meeting','expire_date_fi','percent_fi','type'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function bookings()
    {
        return $this->hasMany('App\booking','user_id','id');
    }
}
