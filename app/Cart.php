<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    protected $casts = [
        'price' => 'integer'
    ];

    protected $dates = [
        'created_at'
    ];

    public function isActive()
    {
        return $this->attributes['buyer_id'] === null
            && !$this->hasExpired();
    }

    public function hasExpired()
    {
        return ! $this->created_at->gte(Carbon::now()->subMinutes(10));
    }

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
        return $query
            ->where('created_at', '>=', Carbon::now()->subMinutes(10))
            ->where('buyer_id', null);
    }
}
