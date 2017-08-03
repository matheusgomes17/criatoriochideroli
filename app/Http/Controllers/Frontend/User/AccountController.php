<?php

namespace SKT\Http\Controllers\Frontend\User;

use SKT\Http\Controllers\Controller;
use SKT\Repositories\Frontend\Catalog\Order\OrderRepository;

/**
 * Class AccountController.
 */
class AccountController extends Controller
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
    public function index()
    {
        $orders = $this->orders->where('user_id', '=', auth()->user()->id)->get();
        
        return view('frontend.user.account', compact('orders'));
    }
}
