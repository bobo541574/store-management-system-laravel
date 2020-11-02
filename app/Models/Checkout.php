<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $fillable = [
        'order_id', 'discount', 'total_price', 'payment_id', 'payment_date', 'status'
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
}