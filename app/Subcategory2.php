<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory2 extends Model
{
    function category(){
        return $this->belongsTo(Category::class);
    }

    function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }

    function subcategory1(){
        return $this->belongsTo(Subcategory1::class);
    }
}
