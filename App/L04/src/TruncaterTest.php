<?php

namespace App\L04\src;

require __DIR__ . '/../../../vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class TruncaterTest extends TestCase
{
    public function testTruncate()
    {
        $truncater = new Truncater();
        $actual = $truncater->truncate('one two');
        $this->assertEquals('one two', $actual);
        $actual = $truncater->truncate('one two', ['length' => 6]);
        $this->assertEquals('one tw...', $actual);
        $actual = $truncater->truncate('one two', ['separator' => '.']);
        $this->assertEquals('one two', $actual);
        $actual = $truncater->truncate('one two', ['length' => '3']);
        $this->assertEquals('one...', $actual);

        $truncater = new Truncater(['length' => 3]);
        $actual = $truncater->truncate('one two');
        $this->assertEquals('one...', $actual);
        $actual = $truncater->truncate('one two', ['separator' => '!']);
        $this->assertEquals('one!', $actual);
        $actual = $truncater->truncate('one two');
        $this->assertEquals('one...', $actual);

        $actual = $truncater->truncate('one two', ['length' => 7]);
        $this->assertEquals('one two', $actual);
    }
}
