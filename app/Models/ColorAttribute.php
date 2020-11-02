<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ColorAttribute extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'color_code'
    ];

    public function productAttrs()
    {
        return $this->hasMany(ProductAttribute::class);
    }
}