<?php

namespace SKT\Models\Catalog\Product;

use Artesaos\Attacher\Traits\HasImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use SKT\Helpers\Searchable\SearchableTrait;
use SKT\Models\Catalog\Product\Traits\ProductAccess;
use SKT\Models\Catalog\Product\Traits\Scope\ProductScope;
use SKT\Models\Catalog\Product\Traits\Attribute\ProductAttribute;
use SKT\Models\Catalog\Product\Traits\Relationship\ProductRelationship;

/**
 * Class Product.
 */
class Product extends Model
{
    use ProductScope,
        ProductAccess,
        Notifiable,
        SoftDeletes,
        ProductAttribute,
        ProductRelationship,
        SearchableTrait,
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
    protected $fillable = ['user_id', 'category_id', 'category_main_id', 'name', 'slug', 'code', 'height', 'color', 'weight', 'birthday', 'description', 'sold', 'status'];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'products.name' => 10,
            'products.code' => 9,
            'products.height' => 8,
        ],
    ];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('catalog.products_table');
    }
}
