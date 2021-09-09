<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehical extends Model
{
    protected $fillable=[
    'make',
    'model',
    'type',
    'status',
    'r_year',
    'color',
    'r_number',
    'status',
    'weight',
    'driver_id'
    ];
     function driver(){
        return $this->belongsTo(Driver::class);
    }
}
