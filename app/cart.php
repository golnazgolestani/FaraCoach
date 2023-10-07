<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    protected $fillable=[
        'user_id','product_id','capacity','fi','off','type_discount','coupon','final_off','type','type_payment_id','status','date_fa','time_fa'
    ];
}
