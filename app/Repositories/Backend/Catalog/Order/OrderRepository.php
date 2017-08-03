<?php

namespace SKT\Repositories\Backend\Catalog\Order;

use SKT\Models\Catalog\Order\Order;
use SKT\Repositories\BaseRepository;

/**
 * Class OrderRepository.
 */
class OrderRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Order::class;

    public function where($attribute, $operator = '=', $value = null)
    {
        return $this->query()->where($attribute, $operator, $value);
    }
}