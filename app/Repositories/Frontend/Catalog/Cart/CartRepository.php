<?php

namespace SKT\Repositories\Frontend\Catalog\Cart;

use Illuminate\Support\Facades\DB;
use SKT\Repositories\BaseRepository;
use SKT\Repositories\Backend\Catalog\Product\ProductRepository;

/**
 * Class CartRepository.
 */
class CartRepository extends BaseRepository
{

    public function __construct(ProductRepository $products)
    {
        $this->products = $products;
    }

    /**
     * @param $id
     *
     * @return static
     */
    public function create($id)
    {
        $cart = getCartSession();

        DB::transaction(function () use ($cart, $id) {

            $product = $this->products->find($id);
            $cart->create($id, $product->name, $product->height, $product->getImageUrl('thumb'));
            session()->put('cart', $cart);

        });

        return $cart;
    }

    /**
     * @param $id
     *
     * @return static
     */
    public function delete($id)
    {
        $cart = getCartSession();
        $cart->delete($id);
        session()->put('cart', $cart);

        return $cart;
    }
}