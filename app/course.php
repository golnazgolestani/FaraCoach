<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    protected $fillable = [
        'course','shortlink' ,'image','teacher_id','type','duration','duration_date','count_students','coaches','coachingbycoach','coachingbyreference','intership','start','end','course_days','course_times','infocourse','exam','certificate','fi','fi_off','type_peymant_id','prepayment','peymant_off','images','status'
    ];

    public function getRouteKeyName()
    {
        return 'shortlink';
    }

    public function students()
    {
        return $this->hasMany('App\student','course_id','id');
    }

    public function teacher()
    {
        return $this->belongsTo('App\teacher','teacher_id','id');
    }

    public function scholarship_course()
    {
        return $this->hasOne('App\checkout','product','id')->where('type','=','scholarship_payment');
    }

    public function invoice()
    {
        return $this->hasMany('App\invoice');
    }

}
