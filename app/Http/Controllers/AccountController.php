<?php

namespace App\Http\Controllers;

use App\Http\Resources\AccountResource;
use App\Models\Account;
use EloquentBuilder;
use Illuminate\Http\Request;

/**
 * Class AccountController
 * @package App\Http\Controllers
 *
 * @author Gustavo Marconi
 * @since 19/08/2020
 */
class AccountController extends Controller
{
    /**
     * Retrieves account list
     *
     * @param Request $request - request object use to filter query results
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getList(Request $request)
    {
        $builder = EloquentBuilder::to(Account::class, $request->all());
        $accounts = $builder->with(['orders', 'orders.order_product'])->get();
        return AccountResource::collection($accounts);
    }

    /**
     * Get account by the given Id
     *
     * @param Request $request
     *
     * @return AccountResource|array
     */
    public function get(Request $request)
    {
        $account = Account::with(['orders', 'orders.order_product'])->find($request->uuid)->first();
        if (!empty($account)) {
            return new AccountResource($account);
        }

        return response('Account not found', 404);
    }
}
