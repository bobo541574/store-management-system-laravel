<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'logo'
    ];

    // public function subcategory()
    // {
    //     return $this->belongsTo(SubCategory::class);
    // }

    public function getPhotoAttribute()
    {
        return asset('/img/brand/' . $this->logo);
    }
}