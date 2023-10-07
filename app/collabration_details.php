<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class collabration_details extends Model
{
    protected $table = 'collabration_details';

    protected $fillable=[
        'title','value','max','status','collabration_categories_id','unit','description','max_faracoach'
    ];

    public function collabration_category()
    {
        return $this->belongsTo('App\collabration_category','collabration_categories_id','id');
    }

    public function collabration_accept()
    {
        return $this->hasMany('App\collabration_accept','collabration_detail_id','id');
    }
}
