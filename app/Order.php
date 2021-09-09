<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    function user(){
        return $this->belongsTo(User::class);
    }
    protected $fillable=['voucher_id','owner_id','email','phone','country','address_1','address_2','city','zip','coupon_id','user_id','order_no','comment','payment_method'];
}
