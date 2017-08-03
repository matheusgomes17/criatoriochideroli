<?php

namespace SKT\Listeners\Frontend\System\Contact;

/**
 * Class ContactEventListener.
 */
class ContactEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'Contact';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->contact->id)
            ->withText('trans("history.frontend.contacts.created") <strong>{contact}</strong>')
            ->withIcon('plus')
            ->withClass('bg-green')
            ->withAssets([
                'contact_string' => $event->contact->name,
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
            \SKT\Events\Frontend\System\Contact\ContactCreated::class,
            'SKT\Listeners\Frontend\System\Contact\ContactEventListener@onCreated'
        );
    }
}
