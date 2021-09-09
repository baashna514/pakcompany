<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageLayout extends Model
{
    protected $fillable = [
        'title', 'category_id', 'background'
    ];

    function category(){
        return $this->belongsTo(Category::class);
    }
}
