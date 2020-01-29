<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sale;
use Faker\Generator as Faker;

$factory->define(Sale::class, function (Faker $faker) {
    return [
        'quantity' => $faker->randomDigitNot(0),
        'discount'=>  $faker->randomDigit(),
        'saleAmount' => $faker->randomDigitNot(0)
    ];
});
