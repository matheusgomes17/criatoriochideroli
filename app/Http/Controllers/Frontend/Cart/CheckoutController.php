<?php

namespace SKT\Http\Controllers\Frontend\Cart;

use SKT\Http\Controllers\Controller;
use SKT\Repositories\Frontend\Catalog\Order\OrderRepository;
use SKT\Http\Requests\Frontend\Cart\ManageCheckoutRequest;

/**
 * Class CartController.
 */
class CheckoutController extends Controller
{
    /**
     * @var OrderRepository
     */
    protected $orders;

    /**
     * FrontendController constructor.
     * @param OrderRepository $orders
     */
    public function __construct(OrderRepository $orders)
    {
        $this->orders = $orders;
    }

    public function store(ManageCheckoutRequest $request)
    {
        if (auth()->user()->orders->where('status', '=', 1)->count() == 0) {
            
            $order = $this->orders->create($request->all());
            return redirect()->route('frontend.cart.checkout.show', $order->id);
        }

        return redirect()->route('frontend.cart.index')->withFlashWarning(trans('alerts.frontend.orders.pending'));
    }

    public function show($id)
    {
        $order = $this->orders->find($id);

        if ($order->status > 0) {
            return redirect()->route('frontend.cart.index')->withFlashSuccess(trans('alerts.frontend.orders.success'));
        }

        return view('frontend.cart.finish-checkout', compact('order'));
    }
}