<?php

namespace SKT\Http\Controllers\Frontend\Blog;

use SKT\Http\Controllers\Controller;
use SKT\Repositories\Backend\Blog\Post\PostRepository;

/**
 * Class BlogController.
 */
class BlogController extends Controller
{
    /**
     * @var PostRepository
     */
    protected $posts;

    /**
     * BlogController constructor.
     * @param PostRepository $posts
     */
    public function __construct(PostRepository $posts)
    {
        $this->posts = $posts;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $post = $this->posts->find($id);

        return view('frontend.post', compact('post'));
    }

}
