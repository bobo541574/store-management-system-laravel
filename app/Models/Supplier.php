<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'name', 'logo'
    ];

    public function contacts()
    {
        return $this->morphMany(Contact::class, 'client');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getPhotoAttribute()
    {
        return asset('/img/supplier/' . $this->logo);
    }

    public function getAddressingAttribute()
    {
        return $this->address; // . ',' . $this->township . ',' . $this->city . ',' . $this->state;
    }

    // public function getProductArrivedAttribute()
    // {
    //     return $this->products()->orderBy('arrived', 'DESC')->get()->groupBy('arrived');
    // }
}