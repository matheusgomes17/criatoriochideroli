<?php

namespace SKT\Listeners\Frontend\Auth;

/**
 * Class UserEventListener.
 */
class UserEventListener
{
    /**
     * @param $event
     */
    public function onLoggedIn($event)
    {
        \Log::info('User Logged In: '.$event->user->full_name);
    }

    /**
     * @param $event
     */
    public function onLoggedOut($event)
    {
        \Log::info('User Logged Out: '.$event->user->full_name);
    }

    /**
     * @param $event
     */
    public function onRegistered($event)
    {
        \Log::info('User Registered: '.$event->user->full_name);
    }

    /**
     * @param $event
     */
    public function onConfirmed($event)
    {
        \Log::info('User Confirmed: '.$event->user->full_name);
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \SKT\Events\Frontend\Auth\UserLoggedIn::class,
            'SKT\Listeners\Frontend\Auth\UserEventListener@onLoggedIn'
        );

        $events->listen(
            \SKT\Events\Frontend\Auth\UserLoggedOut::class,
            'SKT\Listeners\Frontend\Auth\UserEventListener@onLoggedOut'
        );

        $events->listen(
            \SKT\Events\Frontend\Auth\UserRegistered::class,
            'SKT\Listeners\Frontend\Auth\UserEventListener@onRegistered'
        );

        $events->listen(
            \SKT\Events\Frontend\Auth\UserConfirmed::class,
            'SKT\Listeners\Frontend\Auth\UserEventListener@onConfirmed'
        );
    }
}
