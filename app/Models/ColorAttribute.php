<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ColorAttribute extends Model
{
    use SoftDeletes;

    public $timestamps = false;

    protected $fillable = [
        'name', 'color_code'
    ];

    public function productAttrs()
    {
        return $this->hasMany(ProductAttribute::class);
    }
}