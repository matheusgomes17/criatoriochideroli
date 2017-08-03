<?php

namespace SKT\Http\Controllers\Backend\Access\User;

use SKT\Models\Access\User\User;
use SKT\Http\Controllers\Controller;
use SKT\Http\Requests\Backend\Access\User\ManageUserRequest;
use SKT\Repositories\Backend\Access\User\UserSessionRepository;

/**
 * Class UserSessionController.
 */
class UserSessionController extends Controller
{
    /**
     * @param User                  $user
     * @param ManageUserRequest     $request
     * @param UserSessionRepository $userSessionRepository
     *
     * @return mixed
     */
    public function clearSession(User $user, ManageUserRequest $request, UserSessionRepository $userSessionRepository)
    {
        $userSessionRepository->clearSession($user);

        return redirect()->back()->withFlashSuccess(trans('alerts.backend.users.session_cleared'));
    }
}
