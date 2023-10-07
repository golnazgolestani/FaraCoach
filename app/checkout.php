<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class checkout extends Model
{
    protected $fillable=[
        'user_id','order_id','product_id','price','type','authority','description','status'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function course()
    {
        return $this->belongsTo('App\course','product_id','id');
    }

    public function event()
    {
        return $this->belongsTo('App\event','product_id','id');
    }

    public function order()
    {
        return $this->belongsTo('App\order','order_id','id');
    }

    public function invoice()
    {
        return $this->belongsTo('App\invoice','order_id','id');
    }

    public function reserve()
    {
        return $this->belongsTo('App\reserve','product_id','id');
    }

    public  function schoalrshipPayment()
    {
        return $this->hasOne('App\scholarship_payment','id','order_id');
    }

    public function scholarship_course()
    {
        return $this->belongsTo('App\course','product_id','id');
    }

    public function faktor()
    {
        return $this->hasOne('App\faktor','authority','authority');
    }

    public function get_faktors()
    {
        return $this->hasMany('App\faktor','checkout_id','id');
    }
}
