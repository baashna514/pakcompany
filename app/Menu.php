<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    function category(){
        return $this->belongsTo(Category::class);
    }
}
