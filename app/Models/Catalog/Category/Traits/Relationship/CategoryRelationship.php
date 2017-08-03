<?php

namespace SKT\Models\Catalog\Category\Traits\Relationship;

/**
 * Class CategoryRelationship.
 */
trait CategoryRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo(config('access.user'));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(config('catalog.product'));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function allproducts()
    {
        return $this->hasMany(config('catalog.product'), 'category_main_id', 'id');
    }
}