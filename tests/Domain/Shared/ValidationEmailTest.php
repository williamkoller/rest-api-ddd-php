<?php

namespace Tests\Domain\Shared;

use PHPUnit\Framework\TestCase;
use App\Domain\Shared\ValidationEmail;

class ValidationEmailTest extends TestCase
{
  public function testValidEmail()
  {
    $this->assertTrue(ValidationEmail::isValid('user@example.com'));
  }

  public function testInvalidEmailWithoutAtSymbol()
  {
    $this->assertFalse(ValidationEmail::isValid('userexample.com'));
  }

  public function testInvalidEmailWithoutDomain()
  {
    $this->assertFalse(ValidationEmail::isValid('user@'));
  }

  public function testInvalidEmailWithSpecialCharacters()
  {
    $this->assertFalse(ValidationEmail::isValid('user@exa mple.com'));
  }

  public function testEmptyString()
  {
    $this->assertFalse(ValidationEmail::isValid(''));
  }
}
