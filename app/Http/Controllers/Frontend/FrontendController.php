<?php

namespace SKT\Http\Controllers\Frontend;

use SKT\Http\Controllers\Controller;
use SKT\Repositories\Backend\Catalog\Category\CategoryRepository;
use SKT\Repositories\Backend\Catalog\Product\ProductRepository;
use SKT\Repositories\Backend\Blog\Post\PostRepository;
use SKT\Repositories\Frontend\System\Newsletter\NewsletterRepository;
use SKT\Repositories\Backend\System\Gallery\GalleryRepository;
use SKT\Http\Requests\Frontend\Search\SearchRequest;

/**
 * Class FrontendController.
 */
class FrontendController extends Controller
{
    /**
     * @var CategoryRepository
     */
    protected $categories;

    /**
     * @var ProductRepository
     */
    protected $products;

    /**
     * @var NewsletterRepository
     */
    protected $newsletters;

    /**
     * @var PostRepository
     */
    protected $posts;

    /**
     * FrontendController constructor.
     * @param CategoryRepository $categories
     * @param ProductRepository $products
     * @param NewsletterRepository $products
     * @param PostRepository $products
     */
    public function __construct(
      CategoryRepository $categories,
      ProductRepository $products,
      NewsletterRepository $newsletters,
      PostRepository $posts
    )
    {
        $this->categories = $categories;
        $this->products = $products;
        $this->newsletters = $newsletters;
        $this->posts = $posts;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $products = $this->products->getAll();
        $posts = $this->posts->getAll();

        return view('frontend.index', compact('products', 'posts'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function about()
    {
        return view('frontend.about-us');
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function category($id)
    {
        $category = $this->categories->find($id);
        $products = (! is_null($category->parent)) ? $category->products()->inRandomOrder()->paginate(12) : $category->allproducts()->inRandomOrder()->paginate(12);

        return view('frontend.category', compact('category', 'products'));
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function product($id)
    {
        $product = $this->products->find($id);
        $relateds = $this->products->where('id', '<>', $id)->get();

        return view('frontend.product', compact('product', 'relateds'));
    }

    /**
     * @param SearchRequest $request
     * @return \Illuminate\View\View
     */
    public function search(SearchRequest $request)
    {
        $keyword = $request->input('search');
        $search = \SKT\Models\Catalog\Product\Product::search($keyword, null, true)->paginate(12);

        return view('frontend.search', compact('keyword', 'search'));
    }

    /**
     * @param GalleryRepository $galleries
     * @return \Illuminate\View\View
     */
    public function gallery(GalleryRepository $galleries)
    {
        return view('frontend.gallery', compact('galleries'));
    }
}
