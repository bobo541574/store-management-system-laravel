<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ColorAttribute;
use App\Models\Order;
use App\Models\ProductAttribute;
use App\Models\SizeAttribute;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    $product_id = $faker->randomElement(ProductAttribute::pluck('id')->toArray());
    $price = ProductAttribute::findOrFail($product_id)->price;
    $color = $faker->randomElement(ColorAttribute::pluck('name')->toArray());
    $letter = $faker->randomElement(SizeAttribute::pluck('letter')->toArray());
    $number = $faker->randomElement(SizeAttribute::pluck('number')->toArray());
    $size = $letter . '-' . $number;
    $name = $faker->name;
    $order_code = 'OID' . date('-d-m-y-h-i-s-') . strtolower($color) . '-' . str_replace('-', '', $size) . '-' . str_replace(' ', '', strtolower($faker->name));
    $order_date = $faker->dateTimeBetween('2020-07-01', '2020-11-30');

    Order::create([
        'product_attr_id'   => $product_id,
        'order_code' => $order_code,
        'price' => $price,
        'quantity' => rand(1, 5),
        'customer_name'    => $name,
        'phone'   => $faker->phoneNumber,
        'discount' => 0,
        'ordered' => $order_date
    ]);

    return [];
});