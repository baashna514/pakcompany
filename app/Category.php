<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable=['name','image'];

    function subcategories(){
        return $this->hasMany(Subcategory::class);
    }

    function subcategory1(){
        return $this->hasMany(Subcategory1::class);
    }

    function subcategory2(){
        return $this->hasMany(Subcategory2::class);
    }

    function menu(){
        return $this->hasMany(Menu::class);
    }

    function products(){
        return $this->hasMany(Product::class);
    }

    function page_layouts(){
        return $this->hasMany(PageLayout::class);
    }
}
