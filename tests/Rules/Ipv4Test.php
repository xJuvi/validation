<?php declare(strict_types=1);

namespace Somnambulist\Components\Validation\Tests\Rules;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Validation\Rules\Ipv4;

class Ipv4Test extends TestCase
{

    public function setUp(): void
    {
        $this->rule = new Ipv4;
    }

    public function testValids()
    {
        $this->assertTrue($this->rule->check('0.0.0.0'));
        $this->assertTrue($this->rule->check('1.2.3.4'));
        $this->assertTrue($this->rule->check('255.255.255.255'));
    }

    public function testInvalids()
    {
        $this->assertFalse($this->rule->check('hf02::2'));
        $this->assertFalse($this->rule->check('12345:0000:3238:DFE1:0063:0000:0000:FEFB'));
    }
}
