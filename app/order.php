<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable=[
        'user_id','product_id','capacity','fi','off','coupon','final_off','type','payment_type','prepaymant','darsadTakhkfif','takhfif_naghdi','baghimandeh_batakhfif','tedad_ghest','fi_ghest','status','date_fa','time_fa','description','authority'
    ];
}
