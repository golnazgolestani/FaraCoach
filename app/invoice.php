<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    protected $fillable=[
        'user_id','course_id','fi','off','score','fi_final','pre_payment','remaining','count_installment','fi_installment','date_installment','expire_date','date_fa','time_fa','insert_user_id','status'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function course()
    {
        return $this->belongsTo('App\course','course_id','id');
    }

    public function checkout()
    {
        return $this->hasOne('App\checkout','order_id','id');
    }


}
