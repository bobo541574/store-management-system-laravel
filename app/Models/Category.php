<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name'
    ];

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function getUrlAttribute()
    {
        return route('categories.show', $this->name);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($category) {
            foreach ($category->subcategories()->get() as $subcategory) {
                $subcategory->delete();
            }
        });

        static::restoring(function ($category) {
            foreach ($category->subcategories()->onlyTrashed()->get() as $subcategory) {
                $subcategory->restore();
            }
        });

        // DB::beginTransaction();

        // try {
        //     static::forceDeleting(function ($category) {
        //         foreach ($category->subcategories->onlyTrashed()->get() as $subcategory) {
        //             $subcategory->forceDelete();
        //         }
        //     });
        //     return "success";
        // } catch (\Exception $e) {
        //     throw $e;
        // }
    }
}