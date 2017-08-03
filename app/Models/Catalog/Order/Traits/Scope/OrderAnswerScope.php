<?php

namespace SKT\Models\Catalog\Order\Traits\Scope;
use Illuminate\Support\Facades\DB;

/**
 * Trait OrderAnswerScope.
 */
trait OrderAnswerScope
{
    /**
     * @param $query
     * @param bool $status
     *
     * @return mixed
     */
    public function scopeActive($query, $status = true)
    {
        return $query->where('status', $status);
    }
}