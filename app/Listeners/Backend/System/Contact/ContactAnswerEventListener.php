<?php

namespace SKT\Listeners\Backend\System\Contact;

/**
 * Class ContactAnswerEventListener.
 */
class ContactAnswerEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'ContactAnswer';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->answer->id)
            ->withText('trans("history.backend.contacts.created") <strong>{answer}</strong>')
            ->withIcon('plus')
            ->withClass('bg-green')
            ->withAssets([
                'answer_string' => $event->answer->contacts->name,
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
            \SKT\Events\Backend\System\Contact\ContactAnswerCreated::class,
            'SKT\Listeners\Backend\System\Contact\ContactAnswerEventListener@onCreated'
        );
    }
}
