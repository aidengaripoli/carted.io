<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sold()
    {
        return $this->hasMany(Cart::class, 'seller_id');
    }

    public function bought()
    {
        return $this->hasMany(Cart::class, 'buyer_id');
    }
}
