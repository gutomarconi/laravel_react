<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ProductResource
 * @package App\Http\Resources
 *
 * @author Gustavo Marconi
 * @since 19/08/2020
 */
class ProductResource extends JsonResource
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
            'description' => $this->description,
            'rental_fee' => $this->rental_fee,
            'install_fee' => $this->install_fee,
            'contract_term' => $this->contract_term,
        ];
    }
}
