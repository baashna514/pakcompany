<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WalletTransaction extends Model
{
    function wallet(){
        return $this->belongsTo(Wallet::class);
    }
}
