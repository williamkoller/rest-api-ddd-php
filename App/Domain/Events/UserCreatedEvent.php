<?php

namespace App\Domain\Events;

use App\Domain\User\User;

class UserCreatedEvent
{
  private User $user;

  public function __construct(User $user)
  {
    $this->user = $user;
  }

  public function getUser(): User
  {
    return $this->user;
  }
}
