<?php

namespace SKT\Http\Controllers\Frontend\Cart;

use SKT\Http\Controllers\Controller;
use SKT\Repositories\Frontend\Catalog\Cart\CartRepository;

/**
 * Class CartController.
 */
class CartController extends Controller
{
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
