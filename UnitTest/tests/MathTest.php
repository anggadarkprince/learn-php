<?php

namespace Anggadarkprince\LearnUnitTest;

use PHPUnit\Framework\TestCase;

class MathTest extends TestCase
{
    public function testSumManual()
    {
        $this->assertEquals(10, Math::sum([2, 3, 5]));
        $this->assertEquals(7, Math::sum([1, 2, 4]));
        $this->assertEquals(4, Math::sum([1, 1, 1, 1]));
    }

    /**
     * @dataProvider getDataProvider
     */
    public function testDataProvider(array $inputs, int $expect)
    {
        $this->assertEquals($expect, Math::sum($inputs));
    }

    public function getDataProvider(): array
    {
        return [
            [[2, 3, 5], 10],
            [[1, 2, 4], 7],
            [[1, 1, 1, 1], 4],
            [[], 0],
        ];
    }

    /**
     * @testWith [[2, 3, 5], 10]
     *           [[1, 2, 4], 7]
     *           [[1, 1, 1, 1], 4]
     *           [[], 0]
     */
    public function testDataProviderWith(array $inputs, int $expect)
    {
        $this->assertEquals($expect, Math::sum($inputs));
    }
}