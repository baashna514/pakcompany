<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderShipping extends Model
{
    protected $fillable=['driver_id','order_id','status'];
}
