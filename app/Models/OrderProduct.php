<?php

namespace App\Models;

use App\Models\Concerns\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class OrderProduct
 * @package App\Models
 *
 * @author Gustavo Marconi
 * @since 19/08/2020
 */
class OrderProduct extends Model
{
    use UsesUuid;

    /**
     * table name
     *
     * @var string
     */
    protected $table = 'orderproduct';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'uuid';

    /**
     * OrderProduct - Product relationship where a order product has one product
     *
     * @return HasOne
     */
    public function product(): HasOne
    {
        return $this->hasOne(Product::class, 'uuid', 'product_uuid');
    }

    /**
     * Order - Account relationship where a Order belongs to a Account
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'uuid', 'order_uuid');
    }
}
