<?php

namespace SKT\Http\Controllers\Backend\Catalog\Category;

use SKT\Models\Catalog\Category\Category;
use SKT\Http\Controllers\Controller;
use SKT\Repositories\Backend\Catalog\Category\CategoryRepository;
use SKT\Http\Requests\Backend\Catalog\Category\StoreCategoryRequest;
use SKT\Http\Requests\Backend\Catalog\Category\ManageCategoryRequest;
use SKT\Http\Requests\Backend\Catalog\Category\UpdateCategoryRequest;

/**
 * Class CategoryController.
 */
class CategoryController extends Controller
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageCategoryRequest $request)
    {
        $categories = $this->categories->getAll();
        return view('backend.catalog.categories.index', compact('categories'));
    }

    /**
     * @param ManageCategoryRequest $request
     *
     * @return mixed
     */
    public function create(ManageCategoryRequest $request)
    {
        $categories = $this->categories->getCategoryOptions();
        return view('backend.catalog.categories.create', compact('categories'));
    }

    /**
     * @param StoreCategoryRequest $request
     *
     * @return mixed
     */
    public function store(StoreCategoryRequest $request)
    {
        $this->categories->create(['data' => $request->all()]);

        return redirect()->route('admin.catalog.category.index')->withFlashSuccess(trans('alerts.backend.categories.created'));
    }

    /**
     * @param Category              $category
     * @param ManageCategoryRequest $request
     *
     * @return mixed
     */
    public function edit(Category $category, ManageCategoryRequest $request)
    {
        $categories = $this->categories->getCategoryOptions($category);
        return view('backend.catalog.categories.edit', compact('categories'))
            ->withCategory($category);
    }

    /**
     * @param Category              $category
     * @param UpdateCategoryRequest $request
     *
     * @return mixed
     */
    public function update(Category $category, UpdateCategoryRequest $request)
    {
        $this->categories->update($category, ['data' => $request->all()]);

        return redirect()->route('admin.catalog.category.index')->withFlashSuccess(trans('alerts.backend.categories.updated'));
    }

    /**
     * @param Category              $category
     * @param ManageCategoryRequest $request
     *
     * @return mixed
     */
    public function destroy(Category $category, ManageCategoryRequest $request)
    {
        $this->categories->delete($category);

        return redirect()->route('admin.catalog.category.deleted')->withFlashSuccess(trans('alerts.backend.categories.deleted'));
    }
}
