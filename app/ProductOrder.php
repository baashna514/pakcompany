<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
   protected $fillable=['product_id','user_id','order_id','image','name','quantity','price','size','color','total'];

   function product(){
      return $this->belongsTo(Product::class);
   }

   function order(){
      return $this->belongsTo(Order::class);
   }
}
