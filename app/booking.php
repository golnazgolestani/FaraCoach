<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    protected $fillable = [
        'user_id', 'start_date', 'start_time', 'end_date', 'end_time', 'duration_booking', 'duration_relax', 'status', 'date_fa', 'time_fa'
    ];

    public function reserve()
    {
        return $this->hasOne('App\reserve', 'booking_id', 'id')->latest();
    }

    public function reserveAccess()
    {
        return $this->hasOne('App\reserve', 'booking_id', 'id')->where('status', '=', 1);
    }

    public function reserves()
    {
        return $this->hasMany('App\reserve', 'booking_id', 'id');
    }


    public function coach()
    {
        return $this->belongsTo('App\coach','user_id','user_id');
    }

    public function feedback()
    {
        return $this->hasOne('App\feedback_coaching','booking_id','id');
    }

    public function homeworks()
    {
        return $this->hasMany('App\homework','booking_id','id');
    }

    public function get_statusBookings($status)
    {
        switch ($status)
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
