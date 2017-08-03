<?php

namespace SKT\Repositories\Backend\System\Gallery;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Artesaos\Attacher\AttacherModel;
use SKT\Exceptions\GeneralException;
use SKT\Models\System\Gallery\Gallery;
use SKT\Repositories\BaseRepository;
use SKT\Events\Backend\System\Gallery\GalleryCreated;
use SKT\Events\Backend\System\Gallery\GalleryUpdated;
use SKT\Events\Backend\System\Gallery\GalleryDeleted;

/**
 * Class GalleryRepository.
 */
class GalleryRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Gallery::class;

    /**
     * @param array $data
     *
     * @return static
     */
    public function create(array $data)
    {
        $gallery = self::MODEL;
        $gallery = new $gallery();
        $gallery->name = $data['name'];

        DB::transaction(function () use ($gallery, $data) {

            if ($gallery->save()) {

                $image = new AttacherModel();
                $image->setupFile($data['image']);
                $image->subject_id = $gallery->id;
                $image->subject_type = self::MODEL;
                $image->file_name = str_random(56) . '.' . $image->file_extension;
                $image->save();

                event(new GalleryCreated($gallery));
            }
        });

        return $gallery;
    }

    /**
     * @param Model $gallery
     * @param array $data
     *
     * @return bool
     * @throws GeneralException
     */
    public function update(Model $gallery, array $data)
    {
        DB::transaction(function () use ($gallery, $data) {

                if (isset($data['image'])) {

                    foreach ($gallery->getImageType() as $value) {
                        unlink($gallery->getImagePath($value));
                    }

                    $gallery->image->delete();
                    
                    $image = new AttacherModel();
                    $image->setupFile($data['image']);
                    $image->subject_id = $gallery->id;
                    $image->subject_type = self::MODEL;
                    $image->file_name = str_random(56) . '.' . $image->file_extension;
                    $image->save();
                }

                if ($gallery->save()) {

                    event(new GalleryUpdated($gallery));

                    return true;
                }
        });
    }

    /**
     * @param Model $gallery
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $gallery)
    {
        DB::transaction(function () use ($gallery) {

            if ($gallery->delete()) {

                if ($gallery->hasImage()) {

                    foreach ($gallery->getImageType() as $value) {
                        unlink($gallery->getImagePath($value));
                    }

                    $gallery->image->delete();
                }
                
                event(new GalleryDeleted($gallery));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.catalog.products.delete_error'));
        });
    }

    public function where($attribute, $operator = '=', $value = null)
    {
        return $this->query()->where($attribute, $operator, $value);
    }
}