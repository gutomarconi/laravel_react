<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class OrderProductResource
 * @package App\Http\Resources
 *
 * @author Gustavo Marconi
 * @since 19/08/2020
 */
class OrderProductResource extends JsonResource
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
            'product' => new ProductResource($this->whenLoaded('product')),
            'rental_fee' => $this->rental_fee,
            'install_fee' => $this->install_fee,
            'total' => $this->total,
        ];
    }
}
