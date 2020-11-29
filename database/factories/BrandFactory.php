<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Brand;
use App\Models\SubCategory;
use Faker\Generator as Faker;

$factory->define(Brand::class, function (Faker $faker) {
    return [
        'name'  => $faker->name,
        'logo'  => "inventory.svg",
        'description'   => $faker->paragraph(2),
    ];
});