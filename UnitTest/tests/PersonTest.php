<?php

namespace Anggadarkprince\LearnUnitTest;

use Exception;
use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    private Person $person;

    /**
     * Fixture before each unit test method is called
     *
     * setUpBeforeClass()
     *  setUp()
     *   testSuccess()
     *  tearDown()
     * -------------------
     *  setUp()
     *   testException()
     *  tearDown()
     * -------------------
     * ...
     * tearDownAfterClass()
     */
    protected function setUp(): void
    {
        //$this->person = new Person("Angga");
    }

    /**
     * Called after each unit test method is called
     */
    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * Called first and only once each test class
     */
    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();
    }

    /**
     * Called last and only once each test class
     */
    public static function tearDownAfterClass(): void
    {
        parent::tearDownAfterClass();
    }

    /**
     * Run before test case, same as setUp() method,
     * allow defined multiple
     * @before
     */
    public function createPerson()
    {
        $this->person = new Person("Angga");
    }

    /**
     * Run after test case, same as tearDown() method,
     * allow defined multiple
     * @after
     */
    public function logAfterTest()
    {

    }

    public function testSuccess()
    {
        $this->assertEquals("Hello Ari, my name is Angga", $this->person->sayHello('Ari'));
    }

    public function testException()
    {
        $this->expectException(Exception::class);

        $this->person->sayHello(null);
    }

    public function testGoodbye()
    {
        $this->expectOutputString("Goodbye Ari" . PHP_EOL);

        $this->person->sayGoodbye("Ari");
    }
}