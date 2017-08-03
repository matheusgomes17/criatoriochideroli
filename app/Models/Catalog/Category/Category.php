<?php

namespace SKT\Models\Catalog\Category;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Kalnoy\Nestedset\NodeTrait;
use SKT\Models\Catalog\Category\Traits\CategoryAccess;
use SKT\Models\Catalog\Category\Traits\Scope\CategoryScope;
use SKT\Models\Catalog\Category\Traits\Attribute\CategoryAttribute;
use SKT\Models\Catalog\Category\Traits\Relationship\CategoryRelationship;

/**
 * Class Category.
 */
class Category extends Model
{
    use CategoryScope,
        CategoryAccess,
        Notifiable,
        SoftDeletes,
        CategoryAttribute,
        CategoryRelationship,
        NodeTrait;

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
    protected $fillable = ['user_id', 'parent_id', 'name', 'slug', 'description'];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'categories';
    }
}
