<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'en_title', 'nl_title', 'en_intro', 'nl_intro', 'en_content', 'nl_content', 'visible','image'
    ];
}
