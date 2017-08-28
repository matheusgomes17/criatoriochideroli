<?php

namespace SKT\Http\Controllers\Frontend\User;

use Artesaos\SEOTools\Traits\SEOTools;
use SKT\Http\Controllers\Traits\HasDefaultSEO;
use SKT\Http\Controllers\Controller;
use SKT\Repositories\Frontend\Catalog\Order\OrderRepository;

/**
 * Class OrderController.
 */
class OrderController extends Controller
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
    public function show($id)
    {
	    $order = $this->orders->find($id);
      $route = route('frontend.user.account');

      $this->seo()->setTitle('Orçamento #00' . $order->id);
      $this->seo()->setDescription('This is my page description');
      $this->seo()->opengraph()->setUrl($route)
          ->addImage(url('/img/frontend/footer-logo.png'), ['height' => 200, 'width' => 206]);
      $this->seo()->twitter()->setUrl($route)
          ->addImage(url('/img/frontend/footer-logo.png'), ['height' => 200, 'width' => 206]);

      $this->getDefaultSEO();

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
