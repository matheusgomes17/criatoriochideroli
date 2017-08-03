<?php

namespace SKT\Models\Catalog\Order\Traits\Relationship;

/**
 * Trait OrderItemRelationship.
 */
trait OrderItemRelationship
{
    /**
     * BelongsTo relations with Product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function products()
    {
        return $this->belongsTo(config('catalog.product'), 'product_id', 'id');
    }

    /**
     * BelongsTo relations with Cart.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orders()
    {
        return $this->belongsTo(config('catalog.order'), 'order_id', 'id');
    }
}