<?php

namespace SKT\Models\History\Traits\Relationship;

use SKT\Models\Access\User\User;
use SKT\Models\History\HistoryType;

/**
 * Class HistoryRelationship.
 */
trait HistoryRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function type()
    {
        return $this->hasOne(HistoryType::class, 'id', 'type_id');
    }
}
