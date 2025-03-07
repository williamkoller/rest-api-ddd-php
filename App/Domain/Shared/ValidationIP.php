<?php

namespace App\Domain\Shared;

class ValidationIP
{
  public static function isValid(string $email): bool
  {
    return filter_var($email, FILTER_VALIDATE_IP) !== false;
  }
}
