<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'description' => $faker->text(50),
        'rental_fee' => $faker->randomFloat(2, 10, 99),
        'install_fee' => $faker->randomFloat(2, 10, 99),
        'contract_term' => $faker->numberBetween(1, 10)
    ];
});
