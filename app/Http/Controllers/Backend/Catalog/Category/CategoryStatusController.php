<?php

namespace SKT\Http\Controllers\Backend\Catalog\Category;

use SKT\Models\Catalog\Category\Category;
use SKT\Http\Controllers\Controller;
use SKT\Repositories\Backend\Catalog\Category\CategoryRepository;
use SKT\Http\Requests\Backend\Catalog\Category\ManageCategoryRequest;

/**
 * Class CategoryStatusController.
 */
class CategoryStatusController extends Controller
{
    /**
     * @var CategoryRepository
     */
    protected $categories;

    /**
     * @param CategoryRepository $categories
     */
    public function __construct(CategoryRepository $categories)
    {
        $this->categories = $categories;
    }

    /**
     * @param ManageCategoryRequest $request
     *
     * @return mixed
     */
    public function getDeactivated(ManageCategoryRequest $request)
    {
        return view('backend.catalog.categories.deactivated');
    }

    /**
     * @param ManageCategoryRequest $request
     *
     * @return mixed
     */
    public function getDeleted(ManageCategoryRequest $request)
    {
        $categories = $this->categories->whereTrashed();
        return view('backend.catalog.categories.deleted', compact('categories'));
    }

    /**
     * @param Category $Category
     * @param $status
     * @param ManageCategoryRequest $request
     *
     * @return mixed
     */
    public function mark(Category $catalog, $status, ManageCategoryRequest $request)
    {
        $this->categories->mark($Category, $status);

        return redirect()->route($status == 1 ? 'admin.catalog.category.index' : 'admin.catalog.category.deactivated')->withFlashSuccess(trans('alerts.backend.categories.updated'));
    }

    /**
     * @param Category              $deletedCategory
     * @param ManageCategoryRequest $request
     *
     * @return mixed
     */
    public function delete(Category $deletedCategory, ManageCategoryRequest $request)
    {
        $this->categories->forceDelete($deletedCategory);

        return redirect()->route('admin.catalog.category.deleted')->withFlashSuccess(trans('alerts.backend.categories.deleted_permanently'));
    }

    /**
     * @param Category              $deletedCategory
     * @param ManageCategoryRequest $request
     *
     * @return mixed
     */
    public function restore(Category $deletedCategory, ManageCategoryRequest $request)
    {
        $this->categories->restore($deletedCategory);

        return redirect()->route('admin.catalog.category.index')->withFlashSuccess(trans('alerts.backend.categories.restored'));
    }
}
