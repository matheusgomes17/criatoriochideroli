<?php

namespace SKT\Http\Controllers\Frontend\Auth;

use Artesaos\SEOTools\Traits\SEOTools;
use SKT\Http\Controllers\Traits\HasDefaultSEO;
use SKT\Http\Controllers\Controller;
use SKT\Events\Frontend\Auth\UserRegistered;
use Illuminate\Foundation\Auth\RegistersUsers;
use SKT\Http\Requests\Frontend\Auth\RegisterRequest;
use SKT\Repositories\Frontend\Access\User\UserRepository;

/**
 * Class RegisterController.
 */
class RegisterController extends Controller
{
    use RegistersUsers, SEOTools, HasDefaultSEO;

    /**
     * @var UserRepository
     */
    protected $user;

    /**
     * RegisterController constructor.
     *
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
        // Where to redirect users after registering
        $this->redirectTo = route(homeRoute());

        $this->user = $user;
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $route = route('frontend.auth.register');

        $this->seo()->setTitle('Registrar');
        $this->seo()->setDescription('This is my page description');
        $this->seo()->opengraph()->setUrl($route);
        $this->seo()->twitter()->setUrl($route);

        $this->getDefaultSEO();

        return view('frontend.auth.register');
    }

    /**
     * @param RegisterRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function register(RegisterRequest $request)
    {
        if (config('access.users.confirm_email')) {
            $user = $this->user->create($request->only('first_name', 'last_name', 'email', 'password', 'ddd', 'phone'));
            event(new UserRegistered($user));

            return redirect($this->redirectPath())->withFlashSuccess(trans('exceptions.frontend.auth.confirmation.created_confirm'));
        } else {
            access()->login($this->user->create($request->only('first_name', 'last_name', 'email', 'password', 'ddd', 'phone')));
            event(new UserRegistered(access()->user()));

            return redirect($this->redirectPath());
        }
    }
}
