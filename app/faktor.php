<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class faktor extends Model
{
    protected $fillable=[
        'user_id','checkout_id','product_id','type','date_createfaktor','date_faktor','fi','status','authority','description','date_pardakht','time_pardakht','checkout_id_pardakht','insert_user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function course()
    {
        return $this->belongsTo('App\course','product_id','id');
    }


}
