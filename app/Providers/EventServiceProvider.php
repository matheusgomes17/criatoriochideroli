<?php

namespace SKT\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

/**
 * Class EventServiceProvider.
 */
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [];

    /**
     * Class event subscribers.
     *
     * @var array
     */
    protected $subscribe = [
        /*
         * Frontend Subscribers
         */

        /*
         * Auth Subscribers
         */
        \SKT\Listeners\Frontend\Auth\UserEventListener::class,

        /*
         * Catalog Subscribers
         */

        /*
         * System Subscribers
         */
        \SKT\Listeners\Frontend\System\Contact\ContactEventListener::class,

        /*
         * Backend Subscribers
         */

        /*
         * Access Subscribers
         */
        \SKT\Listeners\Backend\Access\User\UserEventListener::class,
        \SKT\Listeners\Backend\Access\Role\RoleEventListener::class,

        /*
         * Blog Subscribers
         */
        \SKT\Listeners\Backend\Blog\Post\PostEventListener::class,

        /*
         * Catalog Subscribers
         */
        \SKT\Listeners\Backend\Catalog\Category\CategoryEventListener::class,
        \SKT\Listeners\Backend\Catalog\Product\ProductEventListener::class,
        \SKT\Listeners\Backend\Catalog\Order\OrderEventListener::class,
        \SKT\Listeners\Backend\Catalog\Order\OrderAnswerEventListener::class,

        /*
         * System Subscribers
         */
        \SKT\Listeners\Backend\System\Contact\ContactAnswerEventListener::class,
        \SKT\Listeners\Backend\System\Gallery\GalleryEventListener::class,
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
