<?php

namespace Anggadarkprince\SimplePhpMvc;

use PHPUnit\Framework\TestCase;
use Monolog\Logger;

class LoggerTest extends TestCase
{
    public function testLogger()
    {
        $logger = new Logger("MyLogger");

        self::assertNotNull($logger);
    }

    public function testLoggerWithName()
    {
        $logger = new Logger(LoggerTest::class);

        self::assertNotNull($logger);
    }
}