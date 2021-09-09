<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopCollection extends Model
{
    function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }
}
