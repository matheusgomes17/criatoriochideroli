<?php

namespace SKT\Repositories\Backend\System\Contact;

use SKT\Models\System\Contact\Contact;
use SKT\Repositories\BaseRepository;

/**
 * Class ContactRepository.
 */
class ContactRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Contact::class;

    public function where($attribute, $operator = '=', $value = null)
    {
        return $this->query()->where($attribute, $operator, $value);
    }
}