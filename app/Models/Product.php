<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'subcategory_id', 'brand_id', 'supplier_id', 'product_code', 'name', 'arrived'
    ];

    public function productAttrs()
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($product) {
            foreach ($product->productAttrs()->get() as $attributes) {
                $attributes->delete();
            }
        });

        static::restoring(function ($product) {
            foreach ($product->productAttrs()->onlyTrashed()->get() as $attributes) {
                $attributes->restore();
            }
        });
    }

    private function totalPrice()
    {
        foreach ($this->productAttrs->groupBy('product_id') as $attributes) {

            $sub_cost = $attributes->sum('cost_quantity');
            $sub_price = $attributes->sum('price_quantity');
            $sub_profit = $sub_price - $sub_cost;

            $price = $attributes->sum('price');
            $cost = $attributes->sum('cost');
        }

        return (object)['price' => $price, 'cost' => $cost, 'sub_cost' => $sub_cost, 'sub_price' => $sub_price, 'sub_profit' => $sub_profit];
    }

    public function getArrivedDateAttribute()
    {
        $date = date_create($this->arrived);
        return date_format($date, 'Y-m-d');
    }

    public function getProductListAttribute()
    {
        foreach ($this->productAttrs->groupBy('product_id') as $attributes) {

            $sub_cost = $attributes->sum('cost_quantity');
            $sub_price = $attributes->sum('price_quantity');
            $sub_profit = $sub_price - $sub_cost;

            $price = $attributes->sum('price');
            $cost = $attributes->sum('cost');
        }

        return (object)['price' => $price, 'cost' => $cost, 'sub_cost' => $sub_cost, 'sub_price' => $sub_price, 'sub_profit' => $sub_profit];

        return $this->totalPrice();
    }

    public function scopeProductAttributes($query)
    {
        $productByArrived = [];

        foreach ($query->get() as $key => $product) {
            $productByArrived[$key]['id'] = $product->id;
            $productByArrived[$key]['supplier'] = $product->supplier->name;
            $productByArrived[$key]['name'] = $product->name;
            $productByArrived[$key]['sub_cost'] = $product->product_list->sub_cost;
            $productByArrived[$key]['sub_price'] = $product->product_list->sub_price;
            $productByArrived[$key]['sub_profit'] = $product->product_list->sub_profit;
            $productByArrived[$key]['arrived'] = $product->arrived_date;
        }
        $total_cost = collect($productByArrived)->sum('sub_cost');
        $total_price = collect($productByArrived)->sum('sub_price');
        $total_profit = collect($productByArrived)->sum('sub_profit');

        return [
            'productByArrived' => $productByArrived,
            'total_cost' => $total_cost,
            'total_price' => $total_price,
            'total_profit' => $total_profit
        ];
    }

    public function scopeThisAttribute($query, $column)
    {
        $product_attr = 0;

        foreach ($query->get() as $product) {
            $product_attr += $product->productAttrs->sum($column);
        }
        return $product_attr;
    }
}