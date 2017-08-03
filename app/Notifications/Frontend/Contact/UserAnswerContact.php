<?php

namespace SKT\Notifications\Frontend\Contact;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

/**
 * Class UserAnswerContact.
 */
class UserAnswerContact extends Notification
{
    use Queueable;

    /**
     * @var
     */
    public $answer;

    /**
     * UserNeedsConfirmation constructor.
     *
     * @param $answer
     */
    public function __construct($answer)
    {
        $this->answer = $answer;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage())
            ->subject('[' . app_name() . '] Re: ' . $this->answer->subject))
            ->line('Sua solicitação (' . $this->answer->id . ') foi atualizada.')
            ->line('"' . $this->answer->contact->message . '"')
            ->line($this->answer->msg);
    }
}
