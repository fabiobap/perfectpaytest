<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $faker->addProvider(new \Bezhanov\Faker\Provider\Commerce($faker));
    return [
        'name' => $faker->productName(),
        'description' => $faker->text(),
        'price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 200)
    ];
});
