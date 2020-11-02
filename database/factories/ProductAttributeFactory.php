<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ColorAttribute;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\SizeAttribute;
use Faker\Generator as Faker;

$factory->define(ProductAttribute::class, function (Faker $faker) {
    $product_id = $faker->randomElement(Product::pluck('id')->toArray());
    $product = ProductAttribute::where('product_id', $product_id)->first();

    $price = rand(2500, 20000);

    if ($price > 2500 && $price < 5000) {
        $cost = $price - 500;
    } else if (($price > 5001 && $price < 10000)) {
        $cost = $price - 1000;
    } else if (($price > 10001 && $price < 15000)) {
        $cost = $price - 2000;
    } else if (($price > 15001 && $price <= 20000)) {
        $cost = $price - 3000;
    } else {
        $cost = $price - 300;
    }

    ProductAttribute::create([
        'product_id'    => $product_id,
        'photo'   => json_encode(["box.jpg", "box.jpg", "box.jpg"]),
        'color_attribute_id' => $faker->randomElement(ColorAttribute::pluck('id')->toArray()),
        'size_attribute_id'    => $faker->randomElement(SizeAttribute::pluck('id')->toArray()),
        'quantity'    => rand(1, 20),
        'price'   => $product->price ?? $price,
        'cost'   => $product->cost ?? $cost,
        'description'    => $faker->paragraph(2),
        'status'    => rand(0, 1)
    ]);

    return [];
});