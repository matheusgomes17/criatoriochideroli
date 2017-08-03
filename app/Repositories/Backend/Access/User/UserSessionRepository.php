<?php

namespace SKT\Repositories\Backend\Access\User;

use SKT\Models\Access\User\User;
use SKT\Exceptions\GeneralException;

/**
 * Class UserSessionRepository.
 */
class UserSessionRepository
{
    /**
     * @param User $user
     *
     * @return mixed
     * @throws GeneralException
     */
    public function clearSession(User $user)
    {
        if ($user->id === access()->id()) {
            throw new GeneralException(trans('exceptions.backend.access.users.cant_delete_own_session'));
        }
        if (config('session.driver') != 'database') {
            throw new GeneralException(trans('exceptions.backend.access.users.session_wrong_driver'));
        }

        return $user->sessions()->delete();
    }
}
