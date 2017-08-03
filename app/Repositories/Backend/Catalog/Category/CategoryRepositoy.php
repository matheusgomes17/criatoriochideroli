<?php

namespace SKT\Repositories\Backend\Catalog\Category;

use SKT\Models\Catalog\Category\Category;
use SKT\Exceptions\GeneralException;
use SKT\Repositories\BaseRepository;
use SKT\Events\Backend\Catalog\Category\CategoryCreated;
use SKT\Events\Backend\Catalog\Category\CategoryDeleted;
use SKT\Events\Backend\Catalog\Category\CategoryUpdated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Kalnoy\Nestedset\Collection;

/**
 * Class CategoryRepository.
 */
class CategoryRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Category::class;

    /**
     * @param array $input
     */
    public function create($input)
    {
        $data = $input['data'];

        $category = $this->createCategoryStub($data);

        DB::transaction(function () use ($category, $data) {

            if ($category->save()) {

                event(new CategoryCreated($category));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.catalog.categories.create_error'));
        });
    }

    /**
     * @param Model $category
     * @param array $input
     *
     * @return bool
     * @throws GeneralException
     */
    public function update(Model $category, array $input)
    {
        $data = $input['data'];

        DB::transaction(function () use ($category, $data) {

            if ($category->update($data)) {
                
                if ($category->save()) {

                    event(new CategoryUpdated($category));

                    return true;
                }
            }

            throw new GeneralException(trans('exceptions.backend.catalog.categories.update_error'));
        });
    }

    /**
     * @param Model $category
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $category)
    {
        if ($category->delete()) {
            event(new CategoryDeleted($category));

            return true;
        }

        throw new GeneralException(trans('exceptions.backend.catalog.categories.delete_error'));
    }

    public function whereTrashed($attribute = 'deleted_at', $operator = '<>', $value = null, $columns = ['*'])
    {
        return $this->query()->onlyTrashed()->where($attribute, $operator, $value)->get($columns);
    }

    /**
     * @param  $except
     * @return Category
     */
    public function getCategoryOptions($except = null) {
        /** @var \Kalnoy\Nestedset\QueryBuilder $query */
        $query = Category::select('id', 'name')->withDepth();

        if ($except) {
            $query->whereNotDescendantOf($except)->where('id', '<>', $except->id);
        }

        return $this->makeOptions($query->get());
    }

    /**
     * @param Collection $items
     * @return static
     */
    protected function makeOptions(Collection $items) {
        $options = ['' => trans('exceptions.backend.catalog.categories.main')];

        foreach ($items as $item) {
            $options[$item->getKey()] = str_repeat('-', $item->depth + 1).' '.$item->name;
        }

        return $options;
    }
    /**
     * @param  $input
     *
     * @return mixed
     */
    protected function createCategoryStub($input)
    {
        $category = self::MODEL;
        $category = new $category;
        $category->name = $input['name'];
        $category->slug = str_slug($input['name']);
        $category->description = $input['description'];
        $category->user_id = auth()->user()->id;
        $category->parent_id = $input['parent_id'];

        return $category;
    }
}
