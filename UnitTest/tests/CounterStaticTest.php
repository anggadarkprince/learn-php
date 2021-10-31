<?php

namespace Anggadarkprince\LearnUnitTest;

use PHPUnit\Framework\TestCase;

class CounterStaticTest extends TestCase
{
    public static Counter $counter;

    /**
     * Sharing fixture (static) allowed to access a static variable or object
     */
    public static function setUpBeforeClass(): void
    {
        self::$counter = new Counter();
    }

    /**
     * @beforeClass
     */
    public function initializeObject()
    {
        echo "Test counter static is started" . PHP_EOL;
    }

    public function testIncrement1()
    {
        self::$counter->increment();

        $this->assertEquals(1, self::$counter->getCounter());
    }

    public function testIncrement2()
    {
        // due to static $counter variable, it will return next value rather than new object
        self::$counter->increment();

        $this->assertEquals(2, self::$counter->getCounter());
    }

    public static function tearDownAfterClass(): void
    {
        echo "Test counter static completed" . PHP_EOL;
    }
}