<?php

namespace SKT\Models\Catalog\Order\Traits\Relationship;

/**
 * Trait OrderRelationship.
 */
trait OrderRelationship
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
     * BelongsTo relations with User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function managers()
    {
        return $this->belongsTo(config('access.user'), 'manager_id', 'id');
    }

    /**
     * HasMany relations with OrderItem.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany(config('catalog.order_item'), 'order_id', 'id');
    }

    /**
     * HasOne relations with OrderAnswer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function answers()
    {
        return $this->hasOne(config('catalog.order_answer'));
    }
}