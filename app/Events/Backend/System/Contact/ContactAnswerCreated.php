<?php

namespace SKT\Events\Backend\System\Contact;

use Illuminate\Queue\SerializesModels;

/**
 * Class ContactAnswerCreated.
 */
class ContactAnswerCreated
{
    use SerializesModels;

    /**
     * @var
     */
    public $answer;

    /**
     * @param $answer
     */
    public function __construct($answer)
    {
        $this->answer = $answer;
    }
}
