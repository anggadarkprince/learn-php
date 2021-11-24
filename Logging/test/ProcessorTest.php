<?php

namespace Anggadarkprince\SimplePhpMvc;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\GitProcessor;
use Monolog\Processor\HostnameProcessor;
use Monolog\Processor\MemoryUsageProcessor;
use Monolog\Test\TestCase;

class ProcessorTest extends TestCase
{
    public function testProcessorRecord()
    {
        $logger = new Logger(ProcessorTest::class);
        $logger->pushHandler(new StreamHandler("php://stderr"));
        $logger->pushProcessor(new GitProcessor());
        $logger->pushProcessor(new MemoryUsageProcessor());
        $logger->pushProcessor(new HostnameProcessor());
        $logger->pushProcessor(function ($record){
            $record["extra"]["mylog"] = [
                "app" => "Learn PHP Logging",
                "author" => "Angga Ari Wijaya"
            ];
            return $record;
        });

        $logger->info("Hello World", ["username"=>"anggaari"]);
        $logger->info("Hello World So");
        $logger->info("Hello World Again");

        self::assertNotNull($logger);
    }
}