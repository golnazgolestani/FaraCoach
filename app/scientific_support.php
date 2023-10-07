<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class scientific_support extends Model
{
    protected $fillable=[
        'level','students_experience','certificates','resume','educational_activity','know_icdl','free_time','blooming_experience','status','user_id','external_experience'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function get_status()
    {
        switch ($this->status)
        {
            case 0:return "در حال بررسی";
                            break;
            case 1:return "در حال همکاری";
                            break;
            default:return "خطا";
        }
    }
}
