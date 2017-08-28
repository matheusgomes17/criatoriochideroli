<?php

namespace SKT\Http\Controllers\Frontend\Contact;

use Artesaos\SEOTools\Traits\SEOTools;
use SKT\Http\Controllers\Traits\HasDefaultSEO;
use SKT\Http\Controllers\Controller;
use SKT\Http\Requests\Frontend\Contact\StoreContactRequest;
use SKT\Repositories\Frontend\System\Contact\ContactRepository;

/**
 * Class ContactController.
 */
class ContactController extends Controller
{
    use SEOTools, HasDefaultSEO;

    /**
     * @var ContactRepository
     */
    protected $contacts;

    /**
     * @param ContactRepository $contacts
     */
    public function __construct(ContactRepository $contacts)
    {
        $this->contacts = $contacts;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $route = route('frontend.contact.index');

        $this->seo()->setTitle('Contato');
        $this->seo()->setDescription('This is my page description');
        $this->seo()->opengraph()->setUrl($route)
            ->addImage(url('/img/frontend/footer-logo.png'), ['height' => 200, 'width' => 206]);
        $this->seo()->twitter()->setUrl($route)
            ->addImage(url('/img/frontend/footer-logo.png'), ['height' => 200, 'width' => 206]);

        $this->getDefaultSEO();

        return view('frontend.contact');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function store(StoreContactRequest $request)
    {
        $this->contacts->create($request->all());

        return redirect()->route('frontend.contact.index')->withFlashSuccess(trans('alerts.frontend.contacts.send'));
    }
}
