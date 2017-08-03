<?php

namespace SKT\Models\Catalog\Order;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use SKT\Models\Catalog\Order\Traits\Attribute\OrderAnswerAttribute;
use SKT\Models\Catalog\Order\Traits\Relationship\OrderAnswerRelationship;
use SKT\Models\Catalog\Order\Traits\Scope\OrderAnswerScope;

/**
 * Class OrderAnswer
 */
class OrderAnswer extends Model
{
    use OrderAnswerScope,
        Notifiable,
        OrderAnswerAttribute,
        OrderAnswerRelationship;

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
    protected $fillable = ['user_id', 'order_id', 'msg'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('catalog.orders_answers_table');
    }
}