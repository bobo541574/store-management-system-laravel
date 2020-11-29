<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name'
    ];

    public function checkout()
    {
        return $this->hasMany(Checkout::class);
    }
}