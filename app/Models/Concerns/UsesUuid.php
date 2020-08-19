<?php

namespace App\Models\Concerns;

use Illuminate\Support\Str;

/**
 * Trait UsesUuid
 * @package App\Models\Concerns
 *
 * @author Gustavo Marconi
 * @since 19/08/2020
 */
trait UsesUuid
{
    protected static function bootUsesUuid()
    {
        static::creating(function ($model) {
            if (!$model->getKey()) {
                $model->{$model->getKeyName()} = (string)Str::uuid();
            }
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }
}
