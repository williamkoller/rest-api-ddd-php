<?php

namespace Tests\Domain\Shared;

use PHPUnit\Framework\TestCase;
use App\Domain\Shared\ValidationIP;

class ValidationIPTest extends TestCase
{
    public function testValidIPv4()
    {
        $this->assertTrue(ValidationIP::isValid('192.168.1.1'));
    }

    public function testValidIPv6()
    {
        $this->assertTrue(ValidationIP::isValid('2001:0db8:85a3:0000:0000:8a2e:0370:7334'));
    }

    public function testInvalidIP()
    {
        $this->assertFalse(ValidationIP::isValid('invalid-ip'));
    }

    public function testEmptyString()
    {
        $this->assertFalse(ValidationIP::isValid(''));
    }

    public function testNonIPString()
    {
        $this->assertFalse(ValidationIP::isValid('hello world'));
    }
}
