<?php

namespace App\Observers;

use App\Models\OrderProduct;

/**
 * Class OrderProductObserver
 * @package App\Observers
 *
 * @author Gustavo Marconi
 * @since 19/08/2020
 */
class OrderProductObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param OrderProduct $orderProduct
     *
     * @return void
     */
    public function created(OrderProduct $orderProduct)
    {
        $orderProduct->order()->increment('total', $orderProduct->total);
    }

    /**
     * Handle the User "delete" event.
     *
     * @param OrderProduct $orderProduct
     *
     * @return void
     */
    public function delete(OrderProduct $orderProduct)
    {
        $orderProduct->order()->decrement('total', $orderProduct->total);
    }
}
