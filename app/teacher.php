<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    protected $table = "teachers";

    protected $fillable = [
        'fname', 'lname','email','tel','sex' ,'type','education','city','image','biography','shortlink'
    ];

    public function getRouteKeyName()
    {
        return 'shortlink';
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
