<?php

namespace SKT\Listeners\Backend\Catalog\Order;

/**
 * Class OrderAnswerEventListener.
 */
class OrderAnswerEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'OrderAnswer';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->answer->id)
            ->withText('trans("history.backend.orders.responded") <strong>{answer}</strong>')
            ->withIcon('plus')
            ->withClass('bg-green')
            ->withAssets([
                'answer_string' => '#00' . $event->answer->id,
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
            \SKT\Events\Backend\Catalog\Order\OrderAnswerCreated::class,
            'SKT\Listeners\Backend\Catalog\Order\OrderAnswerEventListener@onCreated'
        );
    }
}
