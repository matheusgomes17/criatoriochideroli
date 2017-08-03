<?php

namespace SKT\Http\Controllers\Backend\Catalog\Order;

use SKT\Models\Catalog\Order\Order;
use SKT\Http\Controllers\Controller;
use SKT\Repositories\Backend\Catalog\Order\OrderRepository;
use SKT\Http\Requests\Backend\Catalog\Order\StoreOrderRequest;
use SKT\Http\Requests\Backend\Catalog\Order\ManageOrderRequest;
use SKT\Http\Requests\Backend\Catalog\Order\UpdateOrderRequest;

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
     * @param OrderRepository $orders
     */
    public function __construct(OrderRepository $orders)
    {
        $this->orders = $orders;
    }

    /**
     * @param ManageOrderRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageOrderRequest $request)
    {
        $orders = $this->orders->where('status', '=', 1)->get();
        
        return view('backend.catalog.orders.index', compact('orders'));
    }

    /**
     * @param StoreOrderRequest $request
     *
     * @return mixed
     */
    public function store(StoreOrderRequest $request)
    {
        $this->orders->create(['data' => $request->all()]);

        return redirect()->route('admin.catalog.order.index')->withFlashSuccess(trans('alerts.backend.orders.created'));
    }
}
