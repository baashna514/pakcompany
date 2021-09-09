<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    
   protected $fillable=['name','image','category_id','subcategory_id'];

   function category(){
        return $this->belongsTo(Category::class);
    }
function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }
    function products(){
        return $this->hasMany(Product::class);
    }
}
