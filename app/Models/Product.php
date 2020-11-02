<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'brand_id', 'supplier_id', 'product_code', 'name', 'arrived'
    ];

    public function productAttrs()
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    private function totalPrice()
    {
        foreach ($this->productAttrs->groupBy('product_id') as $attributes) {

            $sub_cost = array_sum($attributes->pluck('cost_quantity')->toArray());
            $sub_price = array_sum($attributes->pluck('price_quantity')->toArray());
            $sub_profit = $sub_price - $sub_cost;

            $price = number_format(array_sum($attributes->pluck('price')->toArray()), 3);
            $cost = number_format(array_sum($attributes->pluck('cost')->toArray()), 3);
            $sub_cost_formatted = number_format($sub_cost, 3);
            $sub_price_formatted = number_format($sub_price, 3);
            $sub_profit_formatted = number_format($sub_profit, 3);
        }

        return (object)['price' => $price, 'cost' => $cost, 'sub_cost' => $sub_cost_formatted, 'sub_price' => $sub_price_formatted, 'sub_profit' => $sub_profit_formatted];
    }

    public function getProductListAttribute()
    {
        return $this->totalPrice();
    }

    public function getArrivedDateAttribute()
    {
        $date = date_create($this->arrived);
        return date_format($date, 'Y-M-d');
    }
}