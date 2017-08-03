<?php

namespace SKT\Models\Catalog\Order;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use SKT\Models\Catalog\Order\Traits\Relationship\OrderItemRelationship;

/**
 * Class OrderItem
 */
class OrderItem extends Model
{
    use Notifiable,
        OrderItemRelationship;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'order_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['product_id', 'order_id', 'qtd'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('catalog.orders_items_table');
    }
}