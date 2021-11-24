<?php

namespace Anggadarkprince\SimplePhpMvc;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Test\TestCase;

class LoggingTest extends TestCase
{
    public function testLogging()
    {
        $logger = new Logger(HandlerTest::class);

        $logger->pushHandler(new StreamHandler("php://stderr"));
        $logger->pushHandler(new StreamHandler(__DIR__ . "/../application.log"));

        $logger->info("Learn PHP Logging");
        $logger->info("Information of Logging");

        self::assertNotNull($logger);

    }
}