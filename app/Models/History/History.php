<?php

namespace SKT\Models\History;

use Illuminate\Database\Eloquent\Model;
use SKT\Models\History\Traits\Relationship\HistoryRelationship;

/**
 * Class History
 * package App.
 */
class History extends Model
{
    use HistoryRelationship;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'history';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['type_id', 'user_id', 'entity_id', 'icon', 'class', 'text', 'assets'];
}
