<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\NameTrait;
use App\Models\SubCategory;
use Faker\Generator as Faker;

$factory->define(SubCategory::class, function (Faker $faker) {
    return [
        'category_id'   => $faker->randomElement(Category::pluck('id')->toArray()),
        'name'  => NameTrait::setName("Sub_Category", SubCategory::count() + 1),
        'description'   => $faker->paragraph(2),
    ];
});