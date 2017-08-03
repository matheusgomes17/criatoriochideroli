<?php

namespace SKT\Http\Controllers\Backend\Blog\Post;

use SKT\Models\Blog\Post\Post;
use SKT\Http\Controllers\Controller;
use SKT\Repositories\Backend\Blog\Post\PostRepository;
use SKT\Http\Requests\Backend\Blog\Post\ManagePostRequest;

/**
 * Class PostStatusController.
 */
class PostStatusController extends Controller
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
     * @return mixed
     */
    public function getDeactivated(ManagePostRequest $request)
    {
        $posts = $this->posts->where('status', '=', 0)->get();
        return view('backend.blog.deactivated', compact('posts'));
    }

    /**
     * @param ManagePostRequest $request
     *
     * @return mixed
     */
    public function getDeleted(ManagePostRequest $request)
    {
        $posts = $this->posts->whereTrashed();
        return view('backend.blog.deleted', compact('posts'));
    }

    /**
     * @param Post $post
     * @param $status
     * @param ManagePostRequest $request
     *
     * @return mixed
     */
    public function mark(Post $post, $status, ManagePostRequest $request)
    {
        $this->posts->mark($post, $status);

        return redirect()->route($status == 1 ? 'admin.blog.post.index' : 'admin.blog.post.deactivated')->withFlashSuccess(trans('alerts.backend.posts.updated'));
    }

    /**
     * @param Post              $deletedPost
     * @param ManagePostRequest $request
     *
     * @return mixed
     */
    public function delete(Post $deletedPost, ManagePostRequest $request)
    {
        $this->posts->forceDelete($deletedPost);

        return redirect()->route('admin.blog.post.deleted')->withFlashSuccess(trans('alerts.backend.posts.deleted_permanently'));
    }

    /**
     * @param Post              $deletedPost
     * @param ManagePostRequest $request
     *
     * @return mixed
     */
    public function restore(Post $deletedPost, ManagePostRequest $request)
    {
        $this->posts->restore($deletedPost);

        return redirect()->route('admin.blog.post.index')->withFlashSuccess(trans('alerts.backend.posts.restored'));
    }
}
