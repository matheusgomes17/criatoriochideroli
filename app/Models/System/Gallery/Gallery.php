<?php

namespace SKT\Models\System\Gallery;

use Artesaos\Attacher\Traits\HasImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use SKT\Models\System\Gallery\Traits\GalleryAccess;
use SKT\Models\System\Gallery\Traits\Attribute\GalleryAttribute;
use SKT\Models\System\Gallery\Traits\Relationship\GalleryRelationship;


/**
 * Class Gallery.
 */
class Gallery extends Model
{
    use Notifiable,
        GalleryAccess,
        GalleryAttribute,
        GalleryRelationship,
        HasImage;

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
    protected $fillable = ['name'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('system.galleries_table');
    }
}
