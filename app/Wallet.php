<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    function wallet_transactions(){
        return $this->hasMany(WalletTransaction::class);
    }
}
