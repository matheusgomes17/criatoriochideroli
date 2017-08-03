<?php

namespace SKT\Listeners\Backend\System\Gallery;

/**
 * Class GalleryEventListener.
 */
class GalleryEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'Gallery';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->gallery->id)
            ->withText('trans("history.backend.galleries.created") <strong>{gallery}</strong>')
            ->withIcon('plus')
            ->withClass('bg-green')
            ->withAssets([
                'gallery_string' => $event->gallery->name,
            ])
            ->log();
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->gallery->id)
            ->withText('trans("history.backend.galleries.updated") <strong>{gallery}</strong>')
            ->withIcon('save')
            ->withClass('bg-aqua')
            ->withAssets([
                'gallery_string' => $event->gallery->name,
            ])
            ->log();
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->gallery->id)
            ->withText('trans("history.backend.galleries.deleted") <strong>{gallery}</strong>')
            ->withIcon('trash')
            ->withClass('bg-maroon')
            ->withAssets([
                'gallery_string' => $event->gallery->name,
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
            \SKT\Events\Backend\System\Gallery\GalleryCreated::class,
            'SKT\Listeners\Backend\System\Gallery\GalleryEventListener@onCreated'
        );

        $events->listen(
            \SKT\Events\Backend\System\Gallery\GalleryUpdated::class,
            'SKT\Listeners\Backend\System\Gallery\GalleryEventListener@onUpdated'
        );
        
        $events->listen(
            \SKT\Events\Backend\System\Gallery\GalleryDeleted::class,
            'SKT\Listeners\Backend\System\Gallery\GalleryEventListener@onDeleted'
        );
    }
}
