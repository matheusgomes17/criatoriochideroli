<?php

namespace SKT\Listeners\Backend\Catalog\Order;

/**
 * Class OrderEventListener.
 */
class OrderEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'Order';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->order->id)
            ->withText('trans("history.backend.orders.created") <strong>{order}</strong>')
            ->withIcon('save')
            ->withClass('bg-aqua')
            ->withAssets([
                'order_string' => '#00' . $event->order->id,
            ])
            ->log();
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \SKT\Events\Frontend\Catalog\Order\OrderCreated::class,
            'SKT\Listeners\Backend\Catalog\Order\OrderEventListener@onCreated'
        );
    }
}
