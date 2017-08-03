<?php

namespace SKT\Http\Controllers\Frontend\Contact;

use SKT\Http\Controllers\Controller;
use SKT\Http\Requests\Frontend\Contact\StoreContactRequest;
use SKT\Repositories\Frontend\System\Contact\ContactRepository;

/**
 * Class ContactController.
 */
class ContactController extends Controller
{
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