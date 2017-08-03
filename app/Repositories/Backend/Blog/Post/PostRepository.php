<?php

namespace SKT\Repositories\Backend\Blog\Post;

use SKT\Models\Blog\Post\Post;
use SKT\Exceptions\GeneralException;
use SKT\Repositories\BaseRepository;
use SKT\Events\Backend\Blog\Post\PostCreated;
use SKT\Events\Backend\Blog\Post\PostDeleted;
use SKT\Events\Backend\Blog\Post\PostUpdated;
use SKT\Events\Backend\Blog\Post\PostPermanentlyDeleted;
use SKT\Events\Backend\Blog\Post\PostRestored;
use SKT\Events\Backend\Blog\Post\PostDeactivated;
use SKT\Events\Backend\Blog\Post\PostReactivated;
use Artesaos\Attacher\AttacherModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class PostRepository.
 */
class PostRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Post::class;

    /**
     * @param array $input
     */
    public function create($input)
    {
        $data = $input['data'];
        $post = $this->createPostStub($data);

        if (is_null($post->category_id)) {
            throw new GeneralException(trans('exceptions.backend.blog.posts.category_error'));
        }

        DB::transaction(function () use ($post, $data) {

            $post->category_main_id = $post->categories->parent->id;

            if ($post->save()) {

                $image = new AttacherModel();
                $image->setupFile($data['cover']);
                $image->subject_id = $post->id;
                $image->subject_type = self::MODEL;
                $image->file_name = str_random(56) . '.' . $image->file_extension;
                $image->save();

                event(new PostCreated($post));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.blog.posts.create_error'));
        });
    }

    /**
     * @param Model $post
     * @param array $input
     *
     * @return bool
     * @throws GeneralException
     */
    public function update(Model $post, array $input)
    {
        $data = $input['data'];

        DB::transaction(function () use ($post, $data) {

            if ($post->update($data)) {

                if (isset($data['cover'])) {

                    foreach ($post->getImageType() as $value) {
                        unlink($post->getImagePath($value));
                    }

                    $post->image->delete();

                    $image = new AttacherModel();
                    $image->setupFile($data['cover']);
                    $image->subject_id = $post->id;
                    $image->subject_type = self::MODEL;
                    $image->file_name = str_random(56) . '.' . $image->file_extension;
                    $image->save();
                }

                if ($post->save()) {

                    event(new PostUpdated($post));

                    return true;
                }
            }

            throw new GeneralException(trans('exceptions.backend.blog.posts.update_error'));
        });
    }

    /**
     * @param Model $post
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $post)
    {
        if ($post->delete()) {
            event(new PostDeleted($post));

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.blog.posts.delete_error'));
    }

    /**
     * @param Model $post
     *
     * @throws GeneralException
     */
    public function forceDelete(Model $post)
    {
        if (is_null($post->deleted_at)) {
            throw new GeneralException(trans('exceptions.backend.blog.posts.delete_first'));
        }

        DB::transaction(function () use ($post) {

            if ($post->forceDelete()) {

                if ($post->hasImage()) {

                    foreach ($post->getImageType() as $value) {
                        unlink($post->getImagePath($value));
                    }

                    $post->image->delete();
                }

                event(new PostPermanentlyDeleted($post));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.blog.posts.delete_error'));
        });
    }

    /**
     * @param Model $post
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function restore(Model $post)
    {
        if (is_null($post->deleted_at)) {
            throw new GeneralException(trans('exceptions.backend.blog.posts.cant_restore'));
        }

        if ($post->restore()) {
            event(new PostRestored($post));

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.blog.posts.restore_error'));
    }

    /**
     * @param Model $post
     * @param $status
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function mark(Model $post, $status)
    {
        $post->status = $status;

        switch ($status) {
            case 0:
                event(new PostDeactivated($post));
            break;

            case 1:
                event(new PostReactivated($post));
            break;
        }

        if ($post->save()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.blog.posts.mark_error'));
    }

    public function where($attribute = 'id', $operator = '=', $value = null)
    {
        return $this->query()->where($attribute, $operator, $value);
    }

    public function whereTrashed($attribute = 'deleted_at', $operator = '<>', $value = null, $columns = ['*'])
    {
        return $this->query()->onlyTrashed()->where($attribute, $operator, $value)->get($columns);
    }

    /**
     * @param  $input
     *
     * @return mixed
     */
    protected function createStub($input)
    {
        $post                = self::MODEL;
        $post                = new $post;
        $post->name          = $input['name'];
        $post->slug          = str_slug($input['name']);
        $post->code          = $input['code'];
        $post->height        = (int) $input['height'];
        $post->color         = $input['color'];
        $post->weight        = (int) $input['weight'];
        $post->birthday      = $input['birthday'];
        $post->description   = $input['description'];
        $post->user_id       = auth()->user()->id;
        $post->category_id   = $input['category_id'];
        $post->sold          = isset($input['sold']) ? true : false;

        return $post;
    }
}
