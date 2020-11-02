<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function checkout()
    {
        return $this->hasMany(Checkout::class);
    }
}