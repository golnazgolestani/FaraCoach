<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class integrityTest extends Model
{
    protected $fillable = [
        'user_id', 'mali','personality','tahodat','relation','health','ghavanin'
    ];
}
