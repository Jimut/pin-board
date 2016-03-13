<?php

namespace App\Policies;

use App\User;
use App\Pin;
use Illuminate\Auth\Access\HandlesAuthorization;

class PinPolicy
{
  use HandlesAuthorization;

  /**
   * Create a new policy instance.
   *
   * @return void
   */
  public function __construct()
  {
      //
  }

  /**
   * Determine if the given pin can be modified by the user.
   *
   * @param  \App\User  $user
   * @param  \App\Pin  $pin
   * @return bool
   */
  public function modify (User $user, Pin $pin) {
    return $user->id === $pin->user_id;
  }
}
