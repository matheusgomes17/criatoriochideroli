<?php

namespace SKT\Http\Controllers\Backend\System\Contact;

use SKT\Models\System\Contact\Contact;
use SKT\Http\Controllers\Controller;
use SKT\Repositories\Backend\System\Contact\ContactRepository;
use SKT\Http\Requests\Backend\System\Contact\StoreContactRequest;
use SKT\Http\Requests\Backend\System\Contact\ManageContactRequest;
use SKT\Http\Requests\Backend\System\Contact\UpdateContactRequest;

/**
 * Class ContactController.
 */
class ContactController extends Controller
{
    /**
     * @var ContactRepository
     */
    protected $contact;

    /**
     * @param ContactRepository $contact
     */
    public function __construct(ContactRepository $contact)
    {
        $this->contact = $contact;
    }

    /**
     * @param ManageContactRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageContactRequest $request)
    {
        $contacts = $this->contact->where('status', '=', 1)->get();
        
        return view('backend.system.contacts.index', compact('contacts'));
    }

    /**
     * @param StoreContactRequest $request
     *
     * @return mixed
     */
    public function store(StoreContactRequest $request)
    {
        $this->contact->create(['data' => $request->all()]);

        return redirect()->route('admin.system.contact.index')->withFlashSuccess(trans('alerts.backend.contacts.created'));
    }
}
