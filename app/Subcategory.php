<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
	protected $fillable=['name','image','category_id'];
    function category(){
        return $this->belongsTo(Category::class);
    }

    function products(){
        return $this->belongsTo(Product::class);
    }

    function product(){
        return $this->belongsToMany(Product::class, 'product_subcategories');
    }

    function subcategory1(){
        return $this->hasMany(Subcategory1::class);
    }
}
