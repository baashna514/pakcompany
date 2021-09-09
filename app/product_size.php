<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_size extends Model
{
	protected $fillable=['size','qunatity','product_id'];
    function product(){
        return $this->belongsTo(Product::class);
    }
}
