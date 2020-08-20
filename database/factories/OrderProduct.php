<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\OrderProduct;
use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(OrderProduct::class, function (Faker $faker) {
    $product = Product::all()->random();
    return [
        'product_uuid' => $product->uuid,
        'rental_fee' => $product->rental_fee,
        'install_fee' => $product->install_fee,
        'total' => (float)$product->rental_fee * (int)($product->contract_term * 12),
    ];
});
