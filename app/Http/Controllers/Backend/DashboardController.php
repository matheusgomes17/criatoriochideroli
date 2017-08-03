<?php

namespace SKT\Http\Controllers\Backend;

use SKT\Http\Controllers\Controller;
use SKT\Repositories\Backend\Catalog\Order\OrderRepository;
use SKT\Repositories\Backend\System\Contact\ContactRepository;
use SKT\Repositories\Backend\Catalog\Product\ProductRepository;
use SKT\Repositories\Backend\Catalog\Category\CategoryRepository;
use SKT\Repositories\Backend\Access\User\UserRepository;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @var OrderRepository
     */
    protected $orders;

    /**
     * @var ContactRepository
     */
    protected $contact;

    /**
     * @var CategoryRepository
     */
    protected $categories;

    /**
     * @var ProductRepository
     */
    protected $products;

    /**
     * @var UserRepository
     */
    protected $users;

    /**
     * @param OrderRepository $contact
     * @param ContactRepository $contact
     * @param CategoryRepository $contact
     * @param ProductRepository $contact
     * @param UserRepository $contact
     */
    public function __construct(OrderRepository $orders, ContactRepository $contacts, CategoryRepository $categories, ProductRepository $products, UserRepository $users)
    {
        $this->orders = $orders;
        $this->contacts = $contacts;
        $this->categories = $categories;
        $this->products = $products;
        $this->users = $users;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
    	$orders = $this->orders->getAll()->count();
    	$contacts = $this->contacts->getAll()->count();
    	$categories = $this->categories->getAll()->count();
    	$products = $this->products->getAll()->count();
    	$users = $this->users->getAll()->count();

        return view('backend.dashboard', compact('orders', 'contacts', 'categories', 'products', 'users'));
    }
}
