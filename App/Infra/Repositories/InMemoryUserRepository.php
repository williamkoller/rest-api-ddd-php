<?php

namespace App\Infra\Repositories;

use App\Domain\Repositories\UserRepositoryInterface;
use App\Domain\User\User;

class InMemoryUserRepository implements UserRepositoryInterface
{
  private array $users = [];

  public function save(User $user): void
  {
    $this->users[$user->getEmail()] = $user;
  }

  public function findByEmail(string $email): ?User
  {
    return $this->users[$email] ?? null;
  }
}
