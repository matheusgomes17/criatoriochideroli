<?php

namespace SKT\Models\System\Newsletter;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use SKT\Models\System\Newsletter\Traits\Scope\NewsletterScope;
use SKT\Models\System\Newsletter\Traits\Attribute\NewsletterAttribute;
use SKT\Models\System\Newsletter\Traits\Relationship\NewsletterRelationship;

/**
 * Class Newsletter.
 */
class Newsletter extends Model
{
    use NewsletterScope,
        Notifiable,
        NewsletterAttribute,
        NewsletterRelationship;

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
    protected $fillable = ['name', 'email', 'status'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('system.newsletters_table');
    }
}
