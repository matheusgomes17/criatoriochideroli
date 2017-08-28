<?php

namespace SKT\Http\Controllers\Frontend\User;

use Artesaos\SEOTools\Traits\SEOTools;
use SKT\Http\Controllers\Traits\HasDefaultSEO;
use SKT\Http\Controllers\Controller;
use SKT\Repositories\Frontend\Catalog\Order\OrderRepository;

/**
 * Class AccountController.
 */
class AccountController extends Controller
{
    use SEOTools, HasDefaultSEO;

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
        $route = route('frontend.user.account');

        $this->seo()->setTitle('Minha Conta');
        $this->seo()->setDescription('This is my page description');
        $this->seo()->opengraph()->setUrl($route)
            ->addImage(url('/img/frontend/footer-logo.png'), ['height' => 200, 'width' => 206]);
        $this->seo()->twitter()->setUrl($route)
            ->addImage(url('/img/frontend/footer-logo.png'), ['height' => 200, 'width' => 206]);

        $this->getDefaultSEO();

        return view('frontend.user.account', compact('orders'));
    }
}
