<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class option extends Model
{
    public function getRouteKeyName()
    {
        return 'option_name';
    }

    protected $fillable = [
        'option_name','option_value',
    ];
}
