<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'product_id','user_id', 'session', 'image', 'name', 'quantity', 'price', 'size', 'color', 'total'
    ];

    function product(){
        return $this->belongsTo(Product::class);
    }
}
