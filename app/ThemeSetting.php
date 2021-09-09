<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThemeSetting extends Model
{
    protected $fillable = [
        'hd_fevicon', 'hd_title', 'hd_phone', 'hd_email', 'hd_logo'
    ];
}
