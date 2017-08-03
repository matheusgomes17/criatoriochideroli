<?php

namespace SKT\Models\System\Contact\Traits\Relationship;

/**
 * Class ContactRelationship.
 */
trait ContactRelationship
{
    /**
     * BelongsTo relations with User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function managers()
    {
        return $this->belongsTo(config('access.user'), 'user_id', 'id');
    }

    /**
     * HasOne relations with OrderAnswer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function answers()
    {
        return $this->hasOne(config('system.contact_answer'));
    }
}