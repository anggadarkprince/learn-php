<?php

namespace Anggadarkprince\LearnUnitTest;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\IncompleteTestError;
use PHPUnit\Framework\TestCase;

class CounterTest extends TestCase
{
    public function testCounter()
    {
        $counter = new Counter();
        $counter->increment();
        $counter->increment();

        Assert::assertEquals(2, $counter->getCounter());

        $counter->increment();
        $this->assertEquals(3, $counter->getCounter());

        $counter->increment();
        self::assertEquals(4, $counter->getCounter());
    }

    public function testIncrement()
    {
        $counter = new Counter();

        self::assertEquals(0, $counter->getCounter());

        self::markTestIncomplete("TODO: will test skip value");

        echo "This echo will not appear"; // because throw exception

        //throw new IncompleteTestError(); // behind markTestIncomplete()
    }

    /**
     * @test
     */
    public function decrement()
    {
        $counter = new Counter();

        $counter->decrement();

        $this->assertEquals(-1, $counter->getCounter());
    }

    /**
     * @test
     */
    public function testDecrementSkip()
    {
        $this->markTestSkipped("Some test case missing, will fix later");

        $counter = new Counter();

        $counter->decrement();

        $this->assertEquals(-1, $counter->getCounter());
    }

    public function testFirst(): Counter
    {
        $counter = new Counter();

        $counter->increment();

        $this->assertEquals(1, $counter->getCounter());

        return $counter;
    }

    /**
     * @depends testFirst
     */
    public function testSecond(Counter $counter)
    {
        $counter->increment();

        $this->assertEquals(2, $counter->getCounter());
    }

    /**
     * @requires OSFAMILY Windows
     * @requires PHP >= 8
     */
    public function testOnlyWindowsPHP8()
    {
        self::assertTrue(true, "Only for windows and php 8");
    }
}