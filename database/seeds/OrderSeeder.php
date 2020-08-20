<?php

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Order::class, 50)
            ->create()
            ->each(function ($order) {
                $order->order_product()->createMany(factory(App\Models\OrderProduct::class, 5)->make()->toArray());
            });
    }
}
