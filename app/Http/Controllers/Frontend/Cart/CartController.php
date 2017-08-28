<?php

namespace SKT\Http\Controllers\Frontend\Cart;

use Artesaos\SEOTools\Traits\SEOTools;
use SKT\Http\Controllers\Traits\HasDefaultSEO;
use SKT\Http\Controllers\Controller;
use SKT\Repositories\Frontend\Catalog\Cart\CartRepository;

/**
 * Class CartController.
 */
class CartController extends Controller
{
    use SEOTools, HasDefaultSEO;

    /**
     * @var CartRepository
     */
    protected $cart;

    /**
     * @param CartRepository $cart
     */
    public function __construct(CartRepository $cart)
    {
        $this->cart = $cart;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $route = route('frontend.cart.index');

        $this->seo()->setTitle('Carrinho de Orçamento');
        $this->seo()->setDescription('');
        $this->seo()->opengraph()->setUrl($route);
        $this->seo()->twitter()->setUrl($route);

        $this->getDefaultSEO();

        return view('frontend.cart.index');
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function store($id)
    {
        $this->cart->create($id);
        return redirect()->route('frontend.cart.index');
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function destroy($id)
    {
        $this->cart->delete($id);
        return redirect()->route('frontend.cart.index');
    }
}
