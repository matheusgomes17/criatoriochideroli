<?php

namespace SKT\Repositories\Backend\Catalog\Product;

use SKT\Models\Catalog\Product\Product;
use SKT\Exceptions\GeneralException;
use SKT\Repositories\BaseRepository;
use SKT\Events\Backend\Catalog\Product\ProductCreated;
use SKT\Events\Backend\Catalog\Product\ProductDeleted;
use SKT\Events\Backend\Catalog\Product\ProductUpdated;
use SKT\Events\Backend\Catalog\Product\ProductPermanentlyDeleted;
use SKT\Events\Backend\Catalog\Product\ProductRestored;
use SKT\Events\Backend\Catalog\Product\ProductDeactivated;
use SKT\Events\Backend\Catalog\Product\ProductReactivated;
use Artesaos\Attacher\AttacherModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class ProductRepository.
 */
class ProductRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Product::class;

    /**
     * @param array $input
     */
    public function create($input)
    {
        $data = $input['data'];
        $product = $this->createProductStub($data);

        if (is_null($product->category_id)) {
            throw new GeneralException(trans('exceptions.backend.catalog.products.category_error'));
        }

        DB::transaction(function () use ($product, $data) {

            $product->category_main_id = $product->categories->parent->id;

            if ($product->save()) {

                $image = new AttacherModel();
                $image->setupFile($data['cover']);
                $image->subject_id = $product->id;
                $image->subject_type = self::MODEL;
                $image->file_name = str_random(56) . '.' . $image->file_extension;
                $image->save();

                event(new ProductCreated($product));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.catalog.products.create_error'));
        });
    }

    /**
     * @param Model $product
     * @param array $input
     *
     * @return bool
     * @throws GeneralException
     */
    public function update(Model $product, array $input)
    {
        $data = $input['data'];

        DB::transaction(function () use ($product, $data) {

            if ($product->update($data)) {

                if (isset($data['cover'])) {

                    foreach ($product->getImageType() as $value) {
                        unlink($product->getImagePath($value));
                    }

                    $product->image->delete();

                    $image = new AttacherModel();
                    $image->setupFile($data['cover']);
                    $image->subject_id = $product->id;
                    $image->subject_type = self::MODEL;
                    $image->file_name = str_random(56) . '.' . $image->file_extension;
                    $image->save();
                }

                if ($product->save()) {

                    event(new ProductUpdated($product));

                    return true;
                }
            }

            throw new GeneralException(trans('exceptions.backend.catalog.products.update_error'));
        });
    }

    /**
     * @param Model $product
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $product)
    {
        if ($product->delete()) {
            event(new ProductDeleted($product));

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.catalog.products.delete_error'));
    }

    /**
     * @param Model $product
     *
     * @throws GeneralException
     */
    public function forceDelete(Model $product)
    {
        if (is_null($product->deleted_at)) {
            throw new GeneralException(trans('exceptions.backend.catalog.products.delete_first'));
        }

        DB::transaction(function () use ($product) {

            if ($product->forceDelete()) {

                if ($product->hasImage()) {

                    foreach ($product->getImageType() as $value) {
                        unlink($product->getImagePath($value));
                    }

                    $product->image->delete();
                }
                
                event(new ProductPermanentlyDeleted($product));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.catalog.products.delete_error'));
        });
    }

    /**
     * @param Model $product
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function restore(Model $product)
    {
        if (is_null($product->deleted_at)) {
            throw new GeneralException(trans('exceptions.backend.catalog.products.cant_restore'));
        }

        if ($product->restore()) {
            event(new ProductRestored($product));

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.catalog.products.restore_error'));
    }

    /**
     * @param Model $product
     * @param $status
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function mark(Model $product, $status)
    {
        $product->status = $status;

        switch ($status) {
            case 0:
                event(new ProductDeactivated($product));
            break;

            case 1:
                event(new ProductReactivated($product));
            break;
        }

        if ($product->save()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.catalog.products.mark_error'));
    }

    /**
     * @param $except
     * @return \SKT\Models\Catalog\Category\Category
     */
    public function getCategoryOptions($except = null)
    {
        /** @var \Kalnoy\Nestedset\QueryBuilder $query */
        $query = \SKT\Models\Catalog\Category\Category::select('id', 'name')->withDepth();

        if ($except) {
            $query->whereNotDescendantOf($except)->where('id', '<>', $except->id);
        }

        return $this->makeCategoryOptions($query->get());
    }

    /**
     * @param \Kalnoy\Nestedset\Collection $items
     * @return static
     */
    protected function makeCategoryOptions(\Kalnoy\Nestedset\Collection $items)
    {
        $options = ['' => trans('exceptions.backend.catalog.products.category_info')];

        if ($items->count() > 0) {
            foreach ($items as $item) {
                if ($item['attributes']['depth'] != 0) {
                    unset($options['']);
                    $options[$item->getKey()] = str_repeat('-', $item->depth) . ' ' . $item->name;
                }
            }
        }

        return $options;
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
    protected function createProductStub($input)
    {
        $product                = self::MODEL;
        $product                = new $product;
        $product->name          = $input['name'];
        $product->slug          = str_slug($input['name']);
        $product->code          = $input['code'];
        $product->height        = (int) $input['height'];
        $product->color         = $input['color'];
        $product->weight        = (int) $input['weight'];
        $product->birthday      = $input['birthday'];
        $product->description   = $input['description'];
        $product->user_id       = auth()->user()->id;
        $product->category_id   = $input['category_id'];
        $product->sold          = isset($input['sold']) ? true : false;

        return $product;
    }
}