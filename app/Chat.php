<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    function user(){
        return $this->belongsTo(User::class);
    }
}
