<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class coach_request extends Model
{
    protected $fillable=[
        'user_id','fk_orientation','create_date','status'
    ];

    public function clinic_basic_info()
    {
        return $this->belongsTo('App\clinic_basic_info','fk_orientation','id');
    }



    public function status()
    {
        switch ($this->status)
        {
            case NULL: return "در حال بررسی";
                        break;
            case 0: return "رد درخواست";
                        break;
            case 1: return "قبول درخواست";
                        break;
            default : return "خطا";

        }
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
