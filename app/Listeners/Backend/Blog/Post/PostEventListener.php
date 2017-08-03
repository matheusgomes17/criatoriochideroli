<?php

namespace SKT\Listeners\Backend\Blog\Post;

/**
 * Class PostEventListener.
 */
class PostEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'Post';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->post->id)
            ->withText('trans("history.backend.posts.created") <strong>{post}</strong>')
            ->withIcon('plus')
            ->withClass('bg-green')
            ->withAssets([
                'post_link' => ['admin.blog.post.show', $event->post->name, $event->post->id],
            ])
            ->log();
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->post->id)
            ->withText('trans("history.backend.posts.updated") <strong>{post}</strong>')
            ->withIcon('save')
            ->withClass('bg-aqua')
            ->withAssets([
                'post_link' => ['admin.blog.post.show', $event->post->name, $event->post->id],
            ])
            ->log();
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->post->id)
            ->withText('trans("history.backend.posts.deleted") <strong>{post}</strong>')
            ->withIcon('trash')
            ->withClass('bg-maroon')
            ->withAssets([
                'post_link' => ['admin.blog.post.show', $event->post->name, $event->post->id],
            ])
            ->log();
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->post->id)
            ->withText('trans("history.backend.posts.restored") <strong>{post}</strong>')
            ->withIcon('refresh')
            ->withClass('bg-aqua')
            ->withAssets([
                'post_link' => ['admin.blog.post.show', $event->post->name, $event->post->id],
            ])
            ->log();
    }

    /**
     * @param $event
     */
    public function onPermanentlyDeleted($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->post->id)
            ->withText('trans("history.backend.posts.permanently_deleted") <strong>{post}</strong>')
            ->withIcon('trash')
            ->withClass('bg-maroon')
            ->withAssets([
                'post_string' => $event->post->name,
            ])
            ->log();

        history()->withType($this->history_slug)
            ->withEntity($event->post->id)
            ->withAssets([
                'post_string' => $event->post->name,
            ])
            ->updatepostLinkAssets();
    }

    /**
     * @param $event
     */
    public function onDeactivated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->post->id)
            ->withText('trans("history.backend.posts.deactivated") <strong>{post}</strong>')
            ->withIcon('times')
            ->withClass('bg-yellow')
            ->withAssets([
                'post_link' => ['admin.blog.post.show', $event->post->name, $event->post->id],
            ])
            ->log();
    }

    /**
     * @param $event
     */
    public function onReactivated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->post->id)
            ->withText('trans("history.backend.posts.reactivated") <strong>{post}</strong>')
            ->withIcon('check')
            ->withClass('bg-green')
            ->withAssets([
                'post_link' => ['admin.blog.post.show', $event->post->name, $event->post->id],
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
            \SKT\Events\Backend\Blog\Post\PostCreated::class,
            'SKT\Listeners\Backend\Blog\Post\PostEventListener@onCreated'
        );

        $events->listen(
            \SKT\Events\Backend\Blog\Post\PostUpdated::class,
            'SKT\Listeners\Backend\Blog\Post\PostEventListener@onUpdated'
        );

        $events->listen(
            \SKT\Events\Backend\Blog\Post\PostDeleted::class,
            'SKT\Listeners\Backend\Blog\Post\PostEventListener@onDeleted'
        );

        $events->listen(
            \SKT\Events\Backend\Blog\Post\PostRestored::class,
            'SKT\Listeners\Backend\Blog\Post\PostEventListener@onRestored'
        );

        $events->listen(
            \SKT\Events\Backend\Blog\Post\PostPermanentlyDeleted::class,
            'SKT\Listeners\Backend\Blog\Post\PostEventListener@onPermanentlyDeleted'
        );

        $events->listen(
            \SKT\Events\Backend\Blog\Post\PostDeactivated::class,
            'SKT\Listeners\Backend\Blog\Post\PostEventListener@onDeactivated'
        );

        $events->listen(
            \SKT\Events\Backend\Blog\Post\PostReactivated::class,
            'SKT\Listeners\Backend\Blog\Post\PostEventListener@onReactivated'
        );
    }
}
