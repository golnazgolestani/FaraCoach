<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoryTag extends Model
{
    protected $fillable = [
        'category', 'status','parent_id'
    ];

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function get_subCategoryTags()
    {
        return $this->hasMany('App\categoryTag','parent_id','id');
    }

    public function tags()
    {
        return $this->hasMany('App\tag','category_tags_id','id');
    }
}
