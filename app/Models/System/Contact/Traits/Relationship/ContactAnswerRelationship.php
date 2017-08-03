<?php

namespace SKT\Models\System\Contact\Traits\Relationship;

/**
 * Class ContactAnswerRelationship.
 */
trait ContactAnswerRelationship
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
    public function contacts()
    {
        return $this->belongsTo(config('system.contact'), 'contact_id', 'id');
    }
}