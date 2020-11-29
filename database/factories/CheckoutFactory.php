<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Checkout;
use Faker\Generator as Faker;

$factory->define(Checkout::class, function (Faker $faker) {
    $order_id = $faker->unique()->randomElement(App\Models\Order::pluck('id')->toArray());
    $quantity = $faker->randomElement(App\Models\Order::find($order_id)->pluck('quantity')->toArray());
    $total_price = $faker->randomElement(App\Models\Order::pluck('quantity')->toArray()) * $faker->randomElement(App\Models\Order::find($order_id)->productAttr()->pluck('price')->toArray());
    return [
        'order_id'  => $order_id,
        'discount'  => 0,
        'quantity'  => $quantity,
        'total_price'   => $total_price,
        'payment_id'    => $faker->randomElement(App\Models\Payment::pluck('id')->toArray()),
        'payment_date'  => $faker->dateTimeBetween('2020-05-01', '2020-11-30'),
    ];
});