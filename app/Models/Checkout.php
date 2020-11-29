<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Checkout extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'order_id', 'discount', 'quantity', 'total_price', 'payment_id', 'payment_date', 'status'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function getCheckoutDateAttribute()
    {
        $date = date_create($this->payment_date);
        return date_format($date, 'Y-M-d');
    }

    public static function groupByMonth($column)
    {
        $month_array = [];

        foreach (range(1, 12) as $i) {
            array_push($month_array, Checkout::whereMonth('payment_date', $i)->sum($column));
        }

        return $month_array;
    }
}