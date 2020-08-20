<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Account;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Account::class, function (Faker $faker) {
    return [
        'email' => Str::random(10).'@gmail.com',
        'first_name' => $faker->firstName(),
        'last_name' => $faker->lastName(),
    ];
});
