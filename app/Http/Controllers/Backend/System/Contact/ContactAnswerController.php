<?php

namespace SKT\Http\Controllers\Backend\System\Contact;

use SKT\Models\System\Contact\Contact;
use SKT\Http\Controllers\Controller;
use SKT\Repositories\Backend\System\Contact\ContactRepository;
use SKT\Repositories\Backend\System\Contact\ContactAnswerRepository;
use SKT\Http\Requests\Backend\System\Contact\StoreContactAnswerRequest;
use SKT\Http\Requests\Backend\System\Contact\ManageContactAnswerRequest;

/**
 * Class ContactAnswerController.
 */
class ContactAnswerController extends Controller
{
    /**
     * @var ContactRepository
     */
    protected $contact;

    /**
     * @var ContactAnswerRepository
     */
    protected $answers;

    /**
     * @param ContactRepository $contact
     */
    public function __construct(ContactRepository $contacts, ContactAnswerRepository $answers)
    {
        $this->contacts = $contacts;
        $this->answers = $answers;
    }

    /**
     * @param ManageContactAnswerRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageContactAnswerRequest $request)
    {
        $contacts = $this->contacts->where('status', '=', 0)->get();
        
        return view('backend.system.contacts.answers.index', compact('contacts'));
    }

    /**
     * @param integer                    $id
     * @param ManageContactAnswerRequest $request
     *
     * @return mixed
     */
    public function create($id, ManageContactAnswerRequest $request)
    {
        $contact = $this->contacts->find($id);

        return view('backend.system.contacts.answers.create', compact('contact'));
    }

    /**
     * @param StoreContactAnswerRequest $request
     *
     * @return mixed
     */
    public function store(StoreContactAnswerRequest $request)
    {
        $this->answers->create(['data' => $request->all()]);

        return redirect()->route('admin.system.contact.answer.index')->withFlashSuccess(trans('alerts.backend.contacts.answers.responded'));
    }

    /**
     * @param integer                    $id
     * @param ManageContactAnswerRequest $request
     *
     * @return mixed
     */
    public function show($id, ManageContactAnswerRequest $request)
    {
        $contact = $this->contacts->find($id);

        return view('backend.system.contacts.answers.show', compact('contact'));
    }
}