<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','p_detail','p_description','user_id','category_id','subcategory_id','brand_id'
    ];
    
    function category(){
        return $this->belongsTo(Category::class);
    }

    function product_size(){
        return $this->hasMany(product_size::class);
    }

    function color_product(){
        return $this->hasMany(color_product::class);
    }
    function deal(){
        return $this->hasMany(DayDeal::class);
    }
    function gallery(){
        return $this->hasMany(Gallery::class);
    }
    
    function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }
    
    function brand(){
        return $this->belongsTo(Brand::class);
    }
    

    function wishlist(){
        return $this->hasMany(WishList::class);
    }

    function top_collections(){
        return $this->hasMany(TopCollection::class);
    }

    function comment(){
        return $this->hasMany(Comment::class);
    }

    function user(){
        return $this->belongsTo(User::class);
    }
    
}
