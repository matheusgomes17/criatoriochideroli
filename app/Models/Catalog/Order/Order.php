<?php

namespace SKT\Models\Catalog\Order;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use SKT\Models\Catalog\Order\Traits\OrderAccess;
use SKT\Models\Catalog\Order\Traits\Scope\OrderScope;
use SKT\Models\Catalog\Order\Traits\Attribute\OrderAttribute;
use SKT\Models\Catalog\Order\Traits\Relationship\OrderRelationship;

/**
 * Class Order.
 */
class Order extends Model
{
    use OrderScope,
        OrderAccess,
        Notifiable,
        OrderAttribute,
        OrderRelationship;

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
    protected $fillable = ['user_id', 'manager_id', 'status', 'height'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('catalog.orders_table');
    }
}