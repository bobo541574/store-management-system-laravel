<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Brand;
use App\Models\SubCategory;
use Faker\Generator as Faker;

$factory->define(Brand::class, function (Faker $faker) {
    return [
        'subcategory_id'   => $faker->randomElement(SubCategory::pluck('id')->toArray()),
        'name'  => $faker->name,
        'logo'  => "inventory.svg",
        'description'   => $faker->paragraph(2),
        'status'    => rand(0, 1),
    ];
});