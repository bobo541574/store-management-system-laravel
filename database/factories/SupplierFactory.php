<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\NameTrait;
use App\Models\Supplier;
use Faker\Generator as Faker;

$factory->define(Supplier::class, function (Faker $faker) {
    return [
        'name'  => NameTrait::setName("Supplier", Supplier::count() + 1),
        'logo'  => "vendor.svg",
    ];
});