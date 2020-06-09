<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Env extends Model
{
    protected $fillable = [
        'name', 'key'
    ];
}
