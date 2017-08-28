<?php

namespace SKT\Http\Controllers\Frontend\Blog;

use Artesaos\SEOTools\Traits\SEOTools;
use SKT\Http\Controllers\Traits\HasDefaultSEO;
use SKT\Http\Controllers\Controller;
use SKT\Repositories\Backend\Blog\Post\PostRepository;

/**
 * Class BlogController.
 */
class BlogController extends Controller
{
    use SEOTools, HasDefaultSEO;

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
        $route = route('frontend.post.show', $post->id);

        $this->seo()->setTitle(str_limit($post->title, 100));
        $this->seo()->setDescription($post->meta_description);
        $this->seo()->opengraph()->setUrl($route)
            ->addImage($post->getImageUrl());
        $this->seo()->twitter()->setUrl($route)
            ->addImage($post->getImageUrl());

        $this->getDefaultSEO();

        return view('frontend.post', compact('post'));
    }

}
