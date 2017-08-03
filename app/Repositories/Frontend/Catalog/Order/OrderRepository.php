<?php

namespace SKT\Repositories\Frontend\Catalog\Order;

use Illuminate\Support\Facades\DB;
use SKT\Models\Catalog\Order\Order;
use SKT\Repositories\BaseRepository;
use SKT\Events\Frontend\Catalog\Order\OrderCreated;

/**
 * Class OrderRepository.
 */
class OrderRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Order::class;

    /**
     * @param array $data
     *
     * @return static
     */
    public function create(array $data)
    {
        if (! session()->has('cart')) {
            return false;
        }
        
        $order = self::MODEL;
        $order = new $order();
        $order->user_id = auth()->user()->id;
        $order->status = 1;

        $cart = session()->get('cart');

        DB::transaction(function () use ($order, $cart) {

            if ($order->save()) {

                foreach ($cart->all() as $id => $item) {
                    $order->items()->create([
                        'product_id' => $id, 'order_id' => $order, 'qtd' => 1
                    ]);
                }

                $cart->clear();

                event(new OrderCreated($order));
            }
        });

        return $order;
    }

    public function where($attribute, $operator = '=', $value = null)
    {
        return $this->query()->where($attribute, $operator, $value);
    }
}