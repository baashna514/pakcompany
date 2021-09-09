<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    function attribute(){
        return $this->belongsTo(Attribute::class);
    }

    function color_product(){
        return $this->hasMany(color_product::class);
    }

    function size_product(){
        return $this->hasMany(size_product::class);
    }
}
