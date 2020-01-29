<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'identification_number' => $faker->numberBetween(10000000000,90000000000),
        'email' => $faker->email
    ];
});
