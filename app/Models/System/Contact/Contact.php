<?php

namespace SKT\Models\System\Contact;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use SKT\Models\System\Contact\Traits\Scope\ContactScope;
use SKT\Models\System\Contact\Traits\Attribute\ContactAttribute;
use SKT\Models\System\Contact\Traits\Relationship\ContactRelationship;

/**
 * Class Contact.
 */
class Contact extends Model
{
    use ContactScope,
        Notifiable,
        ContactAttribute,
        ContactRelationship;

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
    protected $fillable = ['name', 'email', 'phone', 'subject', 'message', 'status', 'user_id'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('system.contacts_table');
    }
}
