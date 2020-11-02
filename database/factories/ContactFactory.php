<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\City;
use App\Models\User;
use App\Models\State;
use App\Models\Contact;
use App\Models\Supplier;
use App\Models\Township;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    $state = State::all();
    $state_id = $faker->randomElement($state->pluck('id')->toArray());
    $city = City::where('state_id', $state_id)->get();
    $city_id = $faker->randomElement($city->pluck('id')->toArray());
    $township = Township::where('city_id', $city_id)->get();
    $township_id = $faker->randomElement($township->pluck('id')->toArray());
    $client_id = array_merge(User::pluck('id')->toArray(), Supplier::pluck('id')->toArray());

    return [
        'client_id' => $faker->randomElement($client_id),
        'client_type' => $faker->randomElement(['App\Models\User', 'App\Models\Supplier']),
        'phone' => $faker->phoneNumber,
        'address'   => $faker->address,
        'township_id'   => $township_id,
        'city_id'   => $city_id,
        'state_id'  => $state_id,
        'email' => $faker->companyEmail,
    ];
});