<?php

namespace SKT\Http\Controllers\Backend\Access\User;

use SKT\Helpers\Auth\Auth;
use SKT\Models\Access\User\User;
use SKT\Exceptions\GeneralException;
use SKT\Http\Controllers\Controller;
use SKT\Http\Requests\Backend\Access\User\ManageUserRequest;

/**
 * Class UserAccessController.
 */
class UserAccessController extends Controller
{
    /**
     * @param User              $user
     * @param ManageUserRequest $request
     *
     * @throws GeneralException
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function loginAs(User $user, ManageUserRequest $request)
    {
        // Overwrite who we're logging in as, if we're already logged in as someone else.
        if (session()->has('admin_user_id') && session()->has('temp_user_id')) {
            // Let's not try to login as ourselves.
            if (access()->id() == $user->id || session()->get('admin_user_id') == $user->id) {
                throw new GeneralException('Do not try to login as yourself.');
            }

            // Overwrite temp user ID.
            session(['temp_user_id' => $user->id]);

            // Login.
            access()->loginUsingId($user->id);

            // Redirect.
            return redirect()->route(homeRoute());
        }

        app()->make(Auth::class)->flushTempSession();

        // Won't break, but don't let them "Login As" themselves
        if (access()->id() == $user->id) {
            throw new GeneralException('Do not try to login as yourself.');
        }

        // Add new session variables
        session(['admin_user_id' => access()->id()]);
        session(['admin_user_name' => access()->user()->full_name]);
        session(['temp_user_id' => $user->id]);

        // Login user
        access()->loginUsingId($user->id);

        // Redirect to frontend
        return redirect()->route(homeRoute());
    }
}
