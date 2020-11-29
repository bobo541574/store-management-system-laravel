<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

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

    public function getTotalPriceAttribute(): string
    {
        return $this->quantity * ($this->price - $this->discount);
    }

    public function getTotalCostAttribute(): string
    {
        return ($this->quantity * $this->productAttr->cost);
    }

    public function getProfitAttribute(): string
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

    public static function scopeGroupByMonth($model, $column)
    {
        $month_array = [];

        foreach (range(1, 12) as $i) {
            array_push($month_array, $model->whereMonth('ordered', $i)->sum($column));
        }

        return $month_array;
    }

    public function scopeGetOrderList($model)
    {
        $order_array = [];
        foreach ($model->get() as $key => $order) {
            $order_array[$key]['id'] = $order->id;
            $order_array[$key]['order_date'] = $order->ordered;
            $order_array[$key]['customer_name'] = $order->customer_name;
            $order_array[$key]['product_name'] = $order->productAttr->product->name;
            $order_array[$key]['quantity'] = $order->quantity;
            $order_array[$key]['cost'] = $order->productAttr->cost;
            $order_array[$key]['total_cost'] = $order->total_cost;
            $order_array[$key]['price'] = $order->productAttr->price;
            $order_array[$key]['total_price'] = $order->total_price;
            $order_array[$key]['profit'] = $order->profit;
        }

        return collect($order_array);
    }
}