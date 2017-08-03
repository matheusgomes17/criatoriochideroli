<?php

namespace SKT\Http\Controllers\Backend\Catalog\Product;

use SKT\Models\Catalog\Product\Product;
use SKT\Http\Controllers\Controller;
use SKT\Repositories\Backend\Catalog\Product\ProductRepository;
use SKT\Http\Requests\Backend\Catalog\Product\StoreProductRequest;
use SKT\Http\Requests\Backend\Catalog\Product\ManageProductRequest;
use SKT\Http\Requests\Backend\Catalog\Product\UpdateProductRequest;

/**
 * Class ProductController.
 */
class ProductController extends Controller
{
    /**
     * @var ProductRepository
     */
    protected $products;

    /**
     * @param ProductRepository $products
     */
    public function __construct(ProductRepository $products)
    {
        $this->products = $products;
    }

    /**
     * @param ManageProductRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageProductRequest $request)
    {
        $products = $this->products->getAll();

        return view('backend.catalog.index', compact('products'));
    }

    /**
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function create(ManageProductRequest $request)
    {
        $categories = $this->products->getCategoryOptions();

        return view('backend.catalog.create', compact('categories'));
    }

    /**
     * @param StoreProductRequest $request
     *
     * @return mixed
     */
    public function store(StoreProductRequest $request)
    {
        $this->products->create(['data' => $request->all()]);

        return redirect()->route('admin.catalog.product.index')->withFlashSuccess(trans('alerts.backend.products.created'));
    }

    /**
     * @param Product              $product
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function edit(Product $product, ManageProductRequest $request)
    {
        $products = $this->products->getCategoryOptions();

        return view('backend.catalog.edit', compact('products'))->withProduct($product);
    }

    /**
     * @param Product              $product
     * @param UpdateProductRequest $request
     *
     * @return mixed
     */
    public function update(Product $product, UpdateProductRequest $request)
    {
        $this->products->update($product, ['data' => $request->all()]);

        return redirect()->route('admin.catalog.product.index')->withFlashSuccess(trans('alerts.backend.products.updated'));
    }

    /**
     * @param Product              $product
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function destroy(Product $product, ManageProductRequest $request)
    {
        $this->products->delete($product);

        return redirect()->route('admin.catalog.product.deleted')->withFlashSuccess(trans('alerts.backend.products.deleted'));
    }
}
