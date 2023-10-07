<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reserve extends Model
{
    protected $fillable = [
        'user_id','booking_id','subject','type_booking','duration_booking','details','fi','off','type_discount','coupon','final_off','presession','status','result_coach','score'
    ];

    public function booking()
    {
        return $this->belongsTo('App\booking','booking_id','id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function checkout()
    {
        return $this->belongsTo('App\checkout','id','product_id');
    }

    public function get_statusReserve()
    {

        switch ($this->status)
        {
            case '1':
                return 'آماده رزرو';
                break;
            case '0':
                return 'رزرو شد';
                break;
            case '3':
                return 'برگزارشد';
                break;
            case '4':
                return 'کنسل شد';
                break;
            case '5':
                return  'غیبت مراجع';
                break;
            case '6':
                return  'غیبت کوچ';
                break;
            case '41':
                return 'کنسل مراجع';
                break;
            case '42':
                return 'کنسل کوچ';
                break;
            default: return 'خطا';

        }
    }


}
