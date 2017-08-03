<?php

namespace SKT\Events\Backend\Blog\Post;

use Illuminate\Queue\SerializesModels;

/**
 * Class PostPermanentlyDeleted.
 */
class PostPermanentlyDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $post;

    /**
     * @param $post
     */
    public function __construct($post)
    {
        $this->post = $post;
    }
}
