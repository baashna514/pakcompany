<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    protected $fillable =['id','user_id','percentage'];
    public function user()
    {
    	return $this->hasMany('App\User','id','user_id');
    }
   
}
