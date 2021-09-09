<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class color_product extends Model
{
    protected $fillable=['id','color_id','product_id'];
    protected $table='color_products';
}
