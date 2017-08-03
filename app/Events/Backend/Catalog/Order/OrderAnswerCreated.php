<?php

namespace SKT\Events\Backend\Catalog\Order;

use Illuminate\Queue\SerializesModels;

/**
 * Class OrderAnswerCreated.
 */
class OrderAnswerCreated
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
