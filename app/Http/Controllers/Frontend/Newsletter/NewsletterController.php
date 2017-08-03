<?php

namespace SKT\Http\Controllers\Frontend\Newsletter;

use SKT\Http\Controllers\Controller;
use SKT\Http\Requests\Frontend\Newsletter\NewsletterRequest;
use SKT\Repositories\Frontend\System\Newsletter\NewsletterRepository;

/**
 * Class NewsletterController.
 */
class NewsletterController extends Controller
{
    /**
     * @var NewsletterRepository
     */
    protected $newsletters;

    /**
     * @param NewsletterRepository $newsletters
     */
    public function __construct(NewsletterRepository $newsletters)
    {
        $this->newsletters = $newsletters;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view('frontend.newsletter');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function store(NewsletterRequest $request)
    {
        $newsletter = $this->newsletters->create($request->all());

        //dd($newsletter);
        
        return redirect()->route('frontend.newsletter.show')->withInput($newsletter->toArray());
    }
}