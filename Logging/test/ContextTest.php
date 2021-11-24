<?php

namespace Anggadarkprince\SimplePhpMvc;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Test\TestCase;

class ContextTest extends TestCase
{
    public function testContext()
    {
        $logger = new Logger(ContextTest::class);
        $logger->pushHandler(new StreamHandler("php://stderr"));

        $logger->info("This is log message", ["username" => "angga", "email" => "angga@mail.com"]);
        $logger->info("Try login user", ["username" => "anggaari"]);
        $logger->info("Success login user", ["username" => "anggaari"]);
        $logger->info("No context");

        self::assertNotNull($logger);
    }
}