<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use EloquentBuilder;
use Illuminate\Http\Request;

/**
 * Class ProductController
 * @package App\Http\Controllers
 *
 * @author Gustavo Marconi
 * @since 19/08/2020
 */
class ProductController extends Controller
{
    /**
     * Retrieves products list
     *
     * @param Request $request - request object use to filter query results
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getList(Request $request)
    {
        $builder = EloquentBuilder::to(Product::class, $request->all());
        $products = $builder->get();
        return ProductResource::collection($products);
    }

    /**
     * Get product by the given Id
     *
     * @param Request $request
     *
     * @return ProductResource|array
     */
    public function get(Request $request)
    {
        $product = Product::find($request->uuid)->first();
        if (!empty($product)) {
            return new ProductResource($product);
        }

        return response('Product not found', 404);
    }
}
