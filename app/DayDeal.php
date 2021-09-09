<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DayDeal extends Model
{
    protected $fillable = [
        'product_id', 'new_price', 'from','to'
    ];

    function product(){
        return $this->belongsTo(Product::class);
    }
}
