<?php

namespace App\Domain\User;

use App\Domain\Shared\ValidationEmail;

interface IUser
{
  public function getUsername(): string;
  public function getEmail(): string;
  public function getAge(): int;
}

class User implements IUser
{
  public string $username;
  public string $email;
  public int $age;

  public function __construct(string $username, string $email, int $age)
  {
    if (!ValidationEmail::isValid($email)) {
      throw new \InvalidArgumentException("E-mail Invalid: $email");
    }

    $this->username = $username;
    $this->email = $email;
    $this->age = $age;
  }

  public function getUsername(): string
  {
    return $this->username;
  }

  public function getEmail(): string
  {
    return $this->email;
  }

  public function getAge(): int
  {
    return $this->age;
  }
}
