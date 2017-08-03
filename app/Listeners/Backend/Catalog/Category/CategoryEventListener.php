<?php

namespace SKT\Listeners\Backend\Catalog\Category;

/**
 * Class CategoryEventListener.
 */
class CategoryEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'Category';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->category->id)
            ->withText('trans("history.backend.categories.created") <strong>{category}</strong>')
            ->withIcon('plus')
            ->withClass('bg-green')
            ->withAssets([
                'category_string' => $event->category->name,
            ])
            ->log();
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->category->id)
            ->withText('trans("history.backend.categories.updated") <strong>{category}</strong>')
            ->withIcon('save')
            ->withClass('bg-aqua')
            ->withAssets([
                'category_string' => $event->category->name,
            ])
            ->log();
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->category->id)
            ->withText('trans("history.backend.categories.deleted") <strong>{category}</strong>')
            ->withIcon('trash')
            ->withClass('bg-maroon')
            ->withAssets([
                'category_string' => $event->category->name,
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
            \SKT\Events\Backend\Catalog\Category\CategoryCreated::class,
            'SKT\Listeners\Backend\Catalog\Category\CategoryEventListener@onCreated'
        );

        $events->listen(
            \SKT\Events\Backend\Catalog\Category\CategoryUpdated::class,
            'SKT\Listeners\Backend\Catalog\Category\CategoryEventListener@onUpdated'
        );

        $events->listen(
            \SKT\Events\Backend\Catalog\Category\CategoryDeleted::class,
            'SKT\Listeners\Backend\Catalog\Category\CategoryEventListener@onDeleted'
        );
    }
}
