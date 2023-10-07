<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wallet_transaction extends Model
{
    protected $fillable=[
        'wallet_id','user_id','amount','inventory','type','product_id','description','date_fa','time_fa','authority','status','checkout_id'
    ];

    public function wallet()
    {
        return $this->belongsTo('App\wallet');
    }

    public function status()
    {
        if($this->status)
        {
            return "واریز";
        }
        else
        {
            return "برداشت";
        }
    }


}
