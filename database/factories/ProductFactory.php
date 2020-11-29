<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Brand;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Supplier;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $id = count(Product::all()) + 1;
    $subcategory_id = $faker->randomElement(SubCategory::pluck('id')->toArray());
    $brand_id = $faker->randomElement(Brand::pluck('id')->toArray());
    $supplier_id = $faker->randomElement(Supplier::pluck('id')->toArray());
    $arrived = $faker->dateTimeBetween('2020-04-01', '2020-11-30');

    $product = Product::create([
        'subcategory_id'  => $subcategory_id,
        'brand_id'  => $brand_id,
        'supplier_id'   => $supplier_id,
        'product_code'  => 'PID-' . $brand_id . '-' . $supplier_id . '-' . ($brand_id + $supplier_id),
        'name'  => "Sample-00" . $id,
        'arrived'   => $arrived,
    ]);

    return [$product];
});