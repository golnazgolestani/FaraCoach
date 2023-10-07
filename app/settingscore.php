<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class settingscore extends Model
{
    protected $fillable = [
        'signup','tel_verified','email_verified','partsprofile','introduced','loginintroduced','changeintroduced'
    ];
}
