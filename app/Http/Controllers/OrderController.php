<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Services\OrderHandlerService;
use EloquentBuilder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class OrderController
 * @package App\Http\Controllers
 *
 * @author Gustavo Marconi
 * @since 19/08/2020
 */
class OrderController extends Controller
{
    /**
     * Retrieves orders list
     *
     * @param Request $request - request object use to filter query results
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getList(Request $request)
    {
        return $this->makeFullResponse($request);
    }

    /**
     * Get a Programme by the given Id
     *
     * @param Request $request
     *
     * @return OrderResource|array
     */
    public function get(Request $request)
    {
        $order = Order::with(['order_product'])->findOrFail($request->uuid);
        return new OrderResource($order);
    }

    /**
     * Update an order
     *
     * @param Request $request
     *
     * @return OrderResource|\Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function update(Request $request)
    {
        $order = Order::with(['order_product'])->findOrFail($request->uuid);
        if (!empty($order)) {
            $order->update($request->all());
            return new OrderResource($order);
        }
        return response('Order not found', 404);
    }

    /**
     * Store a new order
     *
     * @param OrderHandlerService $orderHandler
     * @param Request $request
     *
     * @return OrderResource
     */
    public function store(OrderHandlerService $orderHandler, Request $request)
    {
        $request->validate([
            'owner' => 'required',
            'status' => 'required'
        ]);

        $orderService = new $orderHandler();
        $order = $orderService->create($request->all());
        $order->load(['order_product', 'account']);
        return new OrderResource($order);
    }

    /**
     * Delete a order
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\RedirectResponse|Response
     */
    public function destroy(Request $request)
    {
        $order = Order::find($request->uuid);
        if (!empty($order)) {
            $order->delete();
            return $this->makeFullResponse($request);
        }

        return response('Order not found', 404);
    }


    public function makeFullResponse(Request $request)
    {
        $builder = EloquentBuilder::to(Order::class, $request->all());
        $orders = $builder->with(['order_product', 'account'])->get();
        return OrderResource::collection($orders);
    }
}
