<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    function wishlist(){
        return $this->hasMany(WishList::class);
    }

    function orders(){
        return $this->hasMany(Order::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
          'email',
          'password',
          'role',
          'points',
          'is_admin', 
          'name',
          'offline',
          'days',
           'shop_name',
           'phone',
           'address1',
           'address2',
           'city',
           'password',
           'country',
           'state',
           'postal_code',
           'cnic',
           'cnic_front_image',
           'cnic_back_image',
           'user_image',
           'shop_logo',
            'shop_page_title',
           'shop_banner',
           'banner','title'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
