<?php

namespace SKT\Models\Catalog\Order\Traits\Relationship;

/**
 * Trait OrderAnswerRelationship.
 */
trait OrderAnswerRelationship
{
    /**
     * BelongsTo relations with User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo(config('access.user'), 'user_id', 'id');
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