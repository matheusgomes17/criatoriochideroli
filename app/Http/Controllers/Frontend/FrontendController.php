<?php

namespace SKT\Http\Controllers\Frontend;

use Artesaos\SEOTools\Traits\SEOTools;
use SKT\Http\Controllers\Traits\HasDefaultSEO;
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
    use SEOTools, HasDefaultSEO;

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
        $route = route('frontend.index');

        $this->seo()->setTitle('Início');
        $this->seo()->setDescription('This is my page description');
        $this->seo()->opengraph()->setUrl($route)
            ->addImage(url('/img/frontend/footer-logo.png'), ['height' => 200, 'width' => 206]);
        $this->seo()->twitter()->setUrl($route)
            ->addImage(url('/img/frontend/footer-logo.png'), ['height' => 200, 'width' => 206]);

        $this->getDefaultSEO();

        return view('frontend.index', compact('products', 'posts'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function about()
    {
        $route = route('frontend.about');

        $this->seo()->setTitle('Sobre Nós');
        $this->seo()->setDescription('This is my page description');
        $this->seo()->opengraph()->setUrl($route)
            ->addImage(url('/img/frontend/footer-logo.png'), ['height' => 200, 'width' => 206]);
        $this->seo()->twitter()->setUrl($route)
            ->addImage(url('/img/frontend/footer-logo.png'), ['height' => 200, 'width' => 206]);

        $this->getDefaultSEO();

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
        $route = route('frontend.category', $category->id);

        $this->seo()->setTitle($category->name . ' Indio Gigante');
        $this->seo()->setDescription($category->description);
        $this->seo()->opengraph()->setUrl($route);
        $this->seo()->twitter()->setUrl($route);
        
        $this->getDefaultSEO();

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
        $route = route('frontend.product', $product->id);

        $this->seo()->setTitle('Indio Gigante ' . $product->name);
        $this->seo()->setDescription($product->description);
        $this->seo()->opengraph()->setUrl($route)
            ->addImage($product->getImageUrl());
        $this->seo()->twitter()->setUrl($route)
            ->addImage($product->getImageUrl());

        $this->getDefaultSEO();

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
        $route = route('frontend.search');

        $this->seo()->setTitle("Pesquisa por {$keyword}");
        $this->seo()->setDescription('');
        $this->seo()->opengraph()->setUrl($route);
        $this->seo()->twitter()->setUrl($route);

        $this->getDefaultSEO();

        return view('frontend.search', compact('keyword', 'search'));
    }

    /**
     * @param GalleryRepository $galleries
     * @return \Illuminate\View\View
     */
    public function gallery(GalleryRepository $galleries)
    {
        $route = route('frontend.product', $product->id);

        $this->seo()->setTitle('Galeria de Imagens');
        $this->seo()->setDescription('Veja as imagens das mais belas e rústicas aves de Indio Gigante do Criatório Chideroli');
        $this->seo()->opengraph()->setUrl($route);
        $this->seo()->twitter()->setUrl($route);

        $this->getDefaultSEO();

        return view('frontend.gallery', compact('galleries'));
    }
}
