<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $fillable = [
        'product_id', 'photo', 'color_attribute_id', 'size_attribute_id', 'quantity', 'price', 'cost', 'description', 'status'
    ];

    protected $appends = [
        'total_cost', 'cost_quantity'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function colorAttr()
    {
        return $this->belongsTo(ColorAttribute::class, 'color_attribute_id');
    }

    public function sizeAttr()
    {
        return $this->belongsTo(SizeAttribute::class, 'size_attribute_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getImageAttribute()
    {
        return asset('/img/product/' . json_decode($this->photo)[0]);
    }

    public function getImagesAttribute()
    {
        $photos = [];
        foreach (json_decode($this->photo) as $photo) {
            array_push($photos, asset('/img/product/' . $photo));
        }
        return $photos;
    }

    public function getCostQuantityAttribute()
    {
        return $this->quantity * ($this->cost + $this->extra);
    }

    public function getPriceQuantityAttribute()
    {
        return $this->quantity * ($this->price);
    }

    public function getTotalCostAttribute()
    {
        return number_format(($this->cost + $this->extra), 3);
    }
}