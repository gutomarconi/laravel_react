<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class OrderResource
 * @package App\Http\Resources
 *
 * @author Gustavo Marconi
 * @since 19/08/2020
 */
class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'uuid' => $this->uuid,
            'placed_at' => $this->created_at,
            'status' => $this->status,
            'total_contract' => $this->total,
            'owner' => new AccountResource($this->whenLoaded('account')),
            'products' => OrderProductResource::collection($this->whenLoaded('order_product')),
        ];
    }
}
