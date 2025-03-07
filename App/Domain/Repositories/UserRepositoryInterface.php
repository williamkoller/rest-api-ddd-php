<?php

namespace App\Domain\Repositories;

use App\Domain\User\User;

interface UserRepositoryInterface
{
  public function save(User $user): void;
  public function findByEmail(string $email): ?User;
}
