<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class coupon extends Model
{
    protected $fillable=[
        'user_id','coupon','discount','type_discount','expire_date','product','category_product','type','limit_user','count','flag'
    ];
}
