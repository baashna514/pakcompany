<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class size_product extends Model
{
    function size(){
        return $this->belongsTo(Value::class);
    }
}
