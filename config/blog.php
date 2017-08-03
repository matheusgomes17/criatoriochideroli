<?php

return [

    /*
     * Posts table used to store posts
     */
    'posts_table' => 'posts',

    /*
     * Post model used by Blog to create correct relations.
     * Update the post if it is in a different namespace.
    */
    'post' => SKT\Models\Blog\Post\Post::class,

];
