<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;

/**
 * Class OrderHandlerService
 * @package App\Servivces
 *
 * @author Gustavo Marconi
 * @since 19/08/2020
 */
class OrderHandlerService
{
    /**
     * Create order and order products when needed
     *
     * @param array $request
     *
     * @return Order
     */
    public function create(array $request): Order
    {
        $order = new Order([
            'account_uuid' => $request['owner'],
            'status' => $request['status'],
        ]);
        $order->save();

        if (!empty($request['products'])) {
            $this->createOrderProducts($request['products'], $order);
        }

        return $order;
    }

    /**
     * Create order products for all given products
     *
     * @param array $products
     * @param Order $order
     *
     * @return void
     */
    public function createOrderProducts(array $products, Order $order): void
    {
        foreach ($products as $id) {
            $product = Product::findOrFail($id);
            $data = [
                'product_uuid' => $id,
                'rental_fee' => $product->rental_fee,
                'install_fee' => $product->install_fee,
                'total' => (float)$product->rental_fee * (int)$product->contract_term * 12,
            ];
            $order->order_product()->create($data);
        }
    }
}
