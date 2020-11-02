<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'product_attr_id', 'order_code', 'quantity', 'price', 'customer_name', 'phone', 'ordered', 'discount'
    ];

    public function productAttr()
    {
        return $this->belongsTo(ProductAttribute::class);
    }

    public function checkout()
    {
        return $this->hasOne(Checkout::class);
    }

    public function getTotalPriceAttribute()
    {
        return ($this->quantity * ($this->price - $this->discount));
    }

    public function getTotalCostAttribute()
    {
        return ($this->quantity * $this->productAttr->cost);
    }

    public function getProfitAttribute()
    {
        return $this->total_price - $this->total_cost;
    }

    public function getOrderDateAttribute()
    {
        $date = date_create($this->ordered);
        return date_format($date, 'Y-M-d');
    }

    public function toggleStatus()
    {
        $this->status = !$this->status;
        return $this;
    }
}