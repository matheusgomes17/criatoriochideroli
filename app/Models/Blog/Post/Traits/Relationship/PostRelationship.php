<?php

namespace SKT\Models\Blog\Post\Traits\Relationship;

/**
 * Class PostRelationship.
 */
trait PostRelationship
{
    /**
     * HasMany relations with Category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categories()
    {
        return $this->hasOne(config('blog.category'), 'id', 'category_id');
    }

    /**
     * HasMany relations with User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo(config('access.user'));
    }
}
