<?php

namespace SKT\Http\Controllers\Frontend\Auth;

use SKT\Http\Controllers\Controller;
use SKT\Repositories\Frontend\Access\User\UserRepository;
use SKT\Http\Requests\Frontend\User\ChangePhoneRequest;

/**
 * Class ChangePhoneController.
 */
class ChangePhoneController extends Controller
{
    /**
   * @var UserRepository
   */
  protected $user;

  /**
   * ChangePhoneController constructor.
   *
   * @param UserRepository $user
   */
  public function __construct(UserRepository $user)
  {
      $this->user = $user;
  }

  /**
   * @param ChangePhoneRequest $request
   *
   * @return mixed
   */
  public function changePhone(ChangePhoneRequest $request)
  {
      $this->user->changePhone($request->only('ddd', 'phone'));

      return redirect()->route('frontend.user.account')->withFlashSuccess(trans('strings.frontend.user.phone_updated'));
  }
}
