<?php

namespace SKT\Repositories\Frontend\System\Contact;

use Illuminate\Support\Facades\DB;
use SKT\Models\System\Contact\Contact;
use SKT\Repositories\BaseRepository;
use SKT\Events\Frontend\System\Contact\ContactCreated;

/**
 * Class ContactRepository.
 */
class ContactRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Contact::class;

    /**
     * @param array $data
     *
     * @return static
     */
    public function create(array $data)
    {
        $contact = self::MODEL;
        $contact = new $contact();
        $contact->name = $data['name'];
        $contact->email = $data['email'];
        $contact->phone = $data['phone'];
        $contact->subject = $data['subject'];
        $contact->message = $data['message'];
        $contact->status = 1;

        DB::transaction(function () use ($contact) {

            if ($contact->save()) {

                event(new ContactCreated($contact));
            }
        });

        return $contact;
    }

    public function where($attribute, $operator = '=', $value = null)
    {
        return $this->query()->where($attribute, $operator, $value);
    }
}