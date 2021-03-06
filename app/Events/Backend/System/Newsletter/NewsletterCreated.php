<?php

namespace SKT\Events\Backend\System\Newsletter;

use Illuminate\Queue\SerializesModels;

/**
 * Class NewsletterCreated.
 */
class NewsletterCreated
{
    use SerializesModels;

    /**
     * @var
     */
    public $newsletter;

    /**
     * @param $newsletter
     */
    public function __construct($newsletter)
    {
        $this->newsletter = $newsletter;
    }
}
