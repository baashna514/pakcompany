<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    protected $fillable=['product_id','user_id'];

    function product(){
        return $this->belongsTo(Product::class);
    }

    function user(){
        return $this->belongsTo(User::class);
    }
}
