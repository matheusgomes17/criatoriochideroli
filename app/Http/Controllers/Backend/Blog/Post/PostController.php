<?php

namespace SKT\Http\Controllers\Backend\Blog\Post;

use SKT\Models\Blog\Post\Post;
use SKT\Http\Controllers\Controller;
use SKT\Repositories\Backend\Blog\Post\PostRepository;
use SKT\Http\Requests\Backend\Blog\Post\StorePostRequest;
use SKT\Http\Requests\Backend\Blog\Post\ManagePostRequest;
use SKT\Http\Requests\Backend\Blog\Post\UpdatePostRequest;

/**
 * Class PostController.
 */
class PostController extends Controller
{
    /**
     * @var PostRepository
     */
    protected $posts;

    /**
     * @param PostRepository $posts
     */
    public function __construct(PostRepository $posts)
    {
        $this->posts = $posts;
    }

    /**
     * @param ManagePostRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManagePostRequest $request)
    {
        $posts = $this->posts->getAll();

        return view('backend.blog.index', compact('posts'));
    }

    /**
     * @param ManagePostRequest $request
     *
     * @return mixed
     */
    public function create(ManagePostRequest $request)
    {
        return view('backend.blog.create');
    }

    /**
     * @param StorePostRequest $request
     *
     * @return mixed
     */
    public function store(StorePostRequest $request)
    {
        $this->posts->create(['data' => $request->all()]);

        return redirect()->route('admin.blog.post.index')->withFlashSuccess(trans('alerts.backend.posts.created'));
    }

    /**
     * @param Post              $post
     * @param ManagePostRequest $request
     *
     * @return mixed
     */
    public function edit(Post $post, ManagePostRequest $request)
    {
        return view('backend.blog.edit')->withPost($post);
    }

    /**
     * @param Post              $post
     * @param UpdatePostRequest $request
     *
     * @return mixed
     */
    public function update(Post $post, UpdatePostRequest $request)
    {
        $this->posts->update($post, ['data' => $request->all()]);

        return redirect()->route('admin.blog.post.index')->withFlashSuccess(trans('alerts.backend.posts.updated'));
    }

    /**
     * @param Post              $post
     * @param ManagePostRequest $request
     *
     * @return mixed
     */
    public function destroy(Post $post, ManagePostRequest $request)
    {
        $this->posts->delete($post);

        return redirect()->route('admin.blog.post.deleted')->withFlashSuccess(trans('alerts.backend.posts.deleted'));
    }
}
