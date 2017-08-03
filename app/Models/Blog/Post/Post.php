<?php

namespace SKT\Models\Blog\Post;

use Artesaos\Attacher\Traits\HasImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use SKT\Models\Blog\Post\Traits\PostAccess;
use SKT\Models\Blog\Post\Traits\Scope\PostScope;
use SKT\Models\Blog\Post\Traits\Attribute\PostAttribute;
use SKT\Models\Blog\Post\Traits\Relationship\PostRelationship;

/**
 * Class Post.
 */
class Post extends Model
{
    use PostScope,
        PostAccess,
        Notifiable,
        SoftDeletes,
        PostAttribute,
        PostRelationship,
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
    protected $fillable = [
        'user_id',
        'slug',
        'title',
        'subtitle',
        'body',
        'meta_description',
    ];

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
        $this->table = config('blog.posts_table');
    }
}
