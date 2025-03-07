<?php

namespace App\Domain\Shared;

class ValidationEmail
{
  public static function isValid(string $email): bool
  {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
  }
}
