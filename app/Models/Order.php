<?php

namespace App\Models;

use App\Models\Concerns\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Order
 * @package App\Models
 *
 * @author Gustavo Marconi
 * @since 19/08/2020
 */
class Order extends Model
{
    use UsesUuid;

    /**
     * table name
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'uuid';

    protected $fillable = [
        'status',
        'account_uuid'
    ];

    /**
     * Order - OrderProduct relationship where a Order has many OrderProducts
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function order_product(): HasMany
    {
        return $this->hasMany(OrderProduct::class, 'order_uuid', 'uuid');
    }

    /**
     * Order - Account relationship where a Order belongs to a Account
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'account_uuid', 'uuid');
    }
}
