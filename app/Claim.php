<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    function claim_gallery(){
        return $this->hasMany(ClaimGallery::class);
    }

    function user(){
        return $this->belongsTo(User::class);
    }
}
