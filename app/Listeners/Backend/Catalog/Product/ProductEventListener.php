<?php

namespace SKT\Listeners\Backend\Catalog\Product;

/**
 * Class ProductEventListener.
 */
class ProductEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'Product';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->product->id)
            ->withText('trans("history.backend.products.created") <strong>{product}</strong>')
            ->withIcon('plus')
            ->withClass('bg-green')
            ->withAssets([
                'product_link' => ['admin.catalog.product.show', $event->product->name, $event->product->id],
            ])
            ->log();
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->product->id)
            ->withText('trans("history.backend.products.updated") <strong>{product}</strong>')
            ->withIcon('save')
            ->withClass('bg-aqua')
            ->withAssets([
                'product_link' => ['admin.catalog.product.show', $event->product->name, $event->product->id],
            ])
            ->log();
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->product->id)
            ->withText('trans("history.backend.products.deleted") <strong>{product}</strong>')
            ->withIcon('trash')
            ->withClass('bg-maroon')
            ->withAssets([
                'product_link' => ['admin.catalog.product.show', $event->product->name, $event->product->id],
            ])
            ->log();
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->product->id)
            ->withText('trans("history.backend.products.restored") <strong>{product}</strong>')
            ->withIcon('refresh')
            ->withClass('bg-aqua')
            ->withAssets([
                'product_link' => ['admin.catalog.product.show', $event->product->name, $event->product->id],
            ])
            ->log();
    }

    /**
     * @param $event
     */
    public function onPermanentlyDeleted($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->product->id)
            ->withText('trans("history.backend.products.permanently_deleted") <strong>{product}</strong>')
            ->withIcon('trash')
            ->withClass('bg-maroon')
            ->withAssets([
                'product_string' => $event->product->name,
            ])
            ->log();

        history()->withType($this->history_slug)
            ->withEntity($event->product->id)
            ->withAssets([
                'product_string' => $event->product->name,
            ])
            ->updateProductLinkAssets();
    }

    /**
     * @param $event
     */
    public function onDeactivated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->product->id)
            ->withText('trans("history.backend.products.deactivated") <strong>{product}</strong>')
            ->withIcon('times')
            ->withClass('bg-yellow')
            ->withAssets([
                'product_link' => ['admin.catalog.product.show', $event->product->name, $event->product->id],
            ])
            ->log();
    }

    /**
     * @param $event
     */
    public function onReactivated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->product->id)
            ->withText('trans("history.backend.products.reactivated") <strong>{product}</strong>')
            ->withIcon('check')
            ->withClass('bg-green')
            ->withAssets([
                'product_link' => ['admin.catalog.product.show', $event->product->name, $event->product->id],
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
            \SKT\Events\Backend\Catalog\Product\ProductCreated::class,
            'SKT\Listeners\Backend\Catalog\Product\ProductEventListener@onCreated'
        );

        $events->listen(
            \SKT\Events\Backend\Catalog\Product\ProductUpdated::class,
            'SKT\Listeners\Backend\Catalog\Product\ProductEventListener@onUpdated'
        );

        $events->listen(
            \SKT\Events\Backend\Catalog\Product\ProductDeleted::class,
            'SKT\Listeners\Backend\Catalog\Product\ProductEventListener@onDeleted'
        );

        $events->listen(
            \SKT\Events\Backend\Catalog\Product\ProductRestored::class,
            'SKT\Listeners\Backend\Catalog\Product\ProductEventListener@onRestored'
        );

        $events->listen(
            \SKT\Events\Backend\Catalog\Product\ProductPermanentlyDeleted::class,
            'SKT\Listeners\Backend\Catalog\Product\ProductEventListener@onPermanentlyDeleted'
        );

        $events->listen(
            \SKT\Events\Backend\Catalog\Product\ProductDeactivated::class,
            'SKT\Listeners\Backend\Catalog\Product\ProductEventListener@onDeactivated'
        );

        $events->listen(
            \SKT\Events\Backend\Catalog\Product\ProductReactivated::class,
            'SKT\Listeners\Backend\Catalog\Product\ProductEventListener@onReactivated'
        );
    }
}
