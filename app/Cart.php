<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    public function seller()
    {
        return $this->belongsTo(User::class);
    }

    public function buyer()
    {
        return $this->belongsTo(User::class);
    }

    public function path()
    {
        return "/carts/{$this->id}";
    }

    public function scopeActive($query)
    {
        return $query->where('buyer_id', null);
    }
}
