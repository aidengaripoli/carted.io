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

    public function isStripeCustomer()
    {
        return $this->attributes['stripe_customer_id'] !== null;
    }

    public function purchase(Cart $cart)
    {
        $this->purchased()->save($cart);
    }

    public function sell(Cart $cart)
    {
        $this->sold()->save($cart);
    }

    public function sold()
    {
        return $this->hasMany(Cart::class, 'seller_id');
    }

    public function purchased()
    {
        return $this->hasMany(Cart::class, 'buyer_id');
    }
}
