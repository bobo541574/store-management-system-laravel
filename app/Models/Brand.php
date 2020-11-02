<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'name', 'subcategory_id', 'logo'
    ];

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function getPhotoAttribute()
    {
        return asset('/img/brand/' . $this->logo);
    }
}