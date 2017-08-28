<?php

namespace SKT\Repositories\Backend\System\Contact;

use Illuminate\Support\Facades\DB;
use SKT\Events\Backend\System\Contact\ContactAnswerCreated;
use SKT\Models\System\Contact\ContactAnswer;
use SKT\Notifications\Frontend\Contact\UserAnswerContact;
use SKT\Repositories\Backend\System\Contact\ContactRepository;
use SKT\Repositories\BaseRepository;
use SKT\Exceptions\GeneralException;

/**
 * Class ContactAnswerRepository.
 */
class ContactAnswerRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = ContactAnswer::class;

    protected $contact;

    public function __construct(ContactRepository $contact)
    {
        $this->contact = $contact;
    }

    /**
     * @param array $input
     */
    public function create($input)
    {
        $data = $input['data'];
        $answer = $this->createStub($data);

        DB::transaction(function () use ($answer, $data) {
            if ($answer->save()) {

                $contact = $this->contact->find($answer->contact_id);
                $contact->status = 0;
                $contact->user_id = auth()->user()->id;
                $contact->save();

                event(new ContactAnswerCreated($answer));
            }

            $answer->notify(new UserAnswerContact($answer));

            return true;
        });
    }

    public function where($attribute, $operator = '=', $value = null)
    {
        return $this->query()->where($attribute, $operator, $value);
    }

    /**
     * @param  $input
     *
     * @return mixed
     */
    protected function createStub($input)
    {
        $answer = self::MODEL;
        $answer = new $answer();
        $answer->user_id = (int) auth()->user()->id;
        $answer->contact_id = (int) $input['contact_id'];
        $answer->msg = (string) $input['answer'];

        return $answer;
    }
}
