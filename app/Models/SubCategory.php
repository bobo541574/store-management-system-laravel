<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'subcategory_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($subcategory) {
            foreach ($subcategory->products()->get() as $products) {
                $products->delete();
            }
        });

        static::restoring(function ($subcategory) {
            foreach ($subcategory->products()->onlyTrashed()->get() as $products) {
                $products->restore();
            }
        });
    }
}