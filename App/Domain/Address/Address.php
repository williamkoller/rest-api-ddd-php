<?php

namespace App\Domain\Address;

use App\Domain\Shared\ValidationIP;

use InvalidArgumentException;

class Address
{
  public string $ip;

  public function __construct(string $ip)
  {
    if (!ValidationIp::isValid($ip)) {
      throw new InvalidArgumentException("Invalid IP: $ip");
    }

    $this->ip = $ip;
  }
}
