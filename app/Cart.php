<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function path()
    {
        return "/carts/{$this->id}";
    }
}
