<?php declare(strict_types=1);

namespace Somnambulist\Components\Validation\Tests\Rules;

use PHPUnit\Framework\TestCase;
use Somnambulist\Components\Validation\Rules\Digits;

class DigitsTest extends TestCase
{

    public function setUp(): void
    {
        $this->rule = new Digits;
    }

    public function testValids()
    {
        $this->assertTrue($this->rule->fillParameters([4])->check(1243));
        $this->assertTrue($this->rule->fillParameters([6])->check(124567));
        $this->assertTrue($this->rule->fillParameters([3])->check('123'));
    }

    public function testInvalids()
    {
        $this->assertFalse($this->rule->fillParameters([7])->check(12345678));
        $this->assertFalse($this->rule->fillParameters([4])->check(12));
        $this->assertFalse($this->rule->fillParameters([3])->check('foo'));
    }
}
