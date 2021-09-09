<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClaimGallery extends Model
{
    function claim(){
        return $this->belongsTo(Claim::class);
    }
}
