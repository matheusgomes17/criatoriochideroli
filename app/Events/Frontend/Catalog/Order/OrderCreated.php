<?php

namespace SKT\Events\Frontend\Catalog\Order;

use Illuminate\Queue\SerializesModels;

/**
 * Class OrderCreated.
 */
class OrderCreated
{
    use SerializesModels;

    /**
     * @var
     */
    public $order;

    /**
     * @param $order
     */
    public function __construct($order)
    {
        $this->order = $order;
    }
}
