<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_subcategory extends Model
{
    protected $table='product_subcategories';

    function products(){
        return $this->belongsTo(Product::class);
    }

    function subcategories(){
        return $this->belongsTo(Subcategory::class);
    }
}
