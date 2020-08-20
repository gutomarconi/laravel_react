<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Account;
use App\Models\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'status' => $faker->randomElement(['Under review', 'In progress', 'Completed']),
        'account_uuid' => Account::all()->random()->uuid,
        'total' => 0,
    ];
});
