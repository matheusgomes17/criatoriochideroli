<?php

namespace SKT\Http\Controllers\Backend\Access\User;

use SKT\Models\Access\User\User;
use SKT\Http\Controllers\Controller;
use SKT\Notifications\Frontend\Auth\UserNeedsConfirmation;
use SKT\Http\Requests\Backend\Access\User\ManageUserRequest;

/**
 * Class UserConfirmationController.
 */
class UserConfirmationController extends Controller
{
    /**
     * @param User              $user
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function sendConfirmationEmail(User $user, ManageUserRequest $request)
    {
        $user->notify(new UserNeedsConfirmation($user->confirmation_code));

        return redirect()->back()->withFlashSuccess(trans('alerts.backend.users.confirmation_email'));
    }
}
