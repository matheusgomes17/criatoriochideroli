<?php

namespace SKT\Models\System\Contact;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use SKT\Models\System\Contact\Traits\Relationship\ContactAnswerRelationship;
use SKT\Models\System\Contact\Traits\Scope\ContactAnswerScope;

/**
 * Class ContactAnswer
 */
class ContactAnswer extends Model
{
    use Notifiable,
        ContactAnswerRelationship;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'contact_id', 'msg'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('system.contacts_answers_table');
    }
}