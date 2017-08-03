<?php

namespace SKT\Http\Controllers\Frontend\User;

use SKT\Http\Controllers\Controller;
use SKT\Repositories\Frontend\Catalog\Order\OrderRepository;

/**
 * Class OrderController.
 */
class OrderController extends Controller
{
    /**
     * @var OrderRepository
     */
    protected $orders;

    /**
     * ProfileController constructor.
     *
     * @param OrderRepository $orders
     */
    public function __construct(OrderRepository $orders)
    {
        $this->orders = $orders;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
	    $order = $this->orders->find($id);

    	if ($order->user_id == auth()->user()->id) {

	    	return view('frontend.user.orders.show', compact('order'));
    	}

    	return redirect()->route('frontend.user.account')->withFlashDanger(trans('alerts.frontend.orders.user_error'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function print($id)
    {
        $order = $this->orders->find($id);

        if ($order->user_id == auth()->user()->id) {

            return view('frontend.user.orders.print', compact('order'));
        }

        return redirect()->route('frontend.user.account')->withFlashDanger(trans('alerts.frontend.orders.user_error'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function pdf($id)
    {
        //
    }
}
