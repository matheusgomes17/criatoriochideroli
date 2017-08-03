<?php

namespace SKT\Http\Controllers\Backend\Catalog\Order;

use SKT\Models\Catalog\Order\OrderAnswer;
use SKT\Http\Controllers\Controller;
use SKT\Repositories\Backend\Catalog\Order\OrderRepository;
use SKT\Repositories\Backend\Catalog\Order\OrderAnswerRepository;
use SKT\Http\Requests\Backend\Catalog\Order\StoreOrderRequest;
use SKT\Http\Requests\Backend\Catalog\Order\ManageOrderAnswerRequest;

/**
 * Class OrderAnswerController.
 */
class OrderAnswerController extends Controller
{
    /**
     * @var OrderRepository
     */
    protected $orders;

    /**
     * @var OrderAnswerRepository
     */
    protected $answers;

    /**
     * @param OrderRepository $orders
     * @param OrderAnswerRepository $answers
     */
    public function __construct(OrderRepository $orders, OrderAnswerRepository $answers)
    {
        $this->orders = $orders;
        $this->answers = $answers;
    }

    /**
     * @param ManageOrderAnswerRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageOrderAnswerRequest $request)
    {
        $orders = $this->orders->where('status', '=', 0)->get();
        
        return view('backend.catalog.orders.answers.index', compact('orders'));
    }

    /**
     * @param integer                  $id
     * @param ManageOrderAnswerRequest $request
     *
     * @return mixed
     */
    public function create($id, ManageOrderAnswerRequest $request)
    {
        $order = $this->orders->find($id);

        return view('backend.catalog.orders.answers.create', compact('order'));
    }

    /**
     * @param StoreOrderRequest $request
     *
     * @return mixed
     */
    public function store(StoreOrderRequest $request)
    {
        $this->answers->create(['data' => $request->all()]);

        return redirect()->route('admin.catalog.order.answer.index')->withFlashSuccess(trans('alerts.backend.orders.answers.responded'));
    }

    /**
     * @param integer                  $id
     * @param ManageOrderAnswerRequest $request
     *
     * @return mixed
     */
    public function show($id, ManageOrderAnswerRequest $request)
    {
        $order = $this->orders->find($id);

        return view('backend.catalog.orders.answers.show', compact('order'));
    }
}