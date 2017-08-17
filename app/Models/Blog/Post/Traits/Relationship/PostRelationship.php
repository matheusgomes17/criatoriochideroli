<?php

namespace SKT\Models\Blog\Post\Traits\Relationship;

/**
 * Class PostRelationship.
 */
trait PostRelationship
{
    /**
     * HasMany relations with User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo(config('access.user'), 'user_id', 'id');
    }
}
