<?php

use PHPUnit\Framework\TestCase;
use App\Utility;

class TestUtility extends TestCase
{
    /**
     * @dataProvider sumProvider
     * */ 
    public function testSum(int $a1, int $a2, int $expect)
    {
        $this->assertEquals(Utility::Sum($a1, $a2), $expect);
    }

    public function sumProvider()
    {
        return [
            [1, 1, 2],
            [-1, -1, -2],
            [1, -1, 0],
            [-1, 99, 98],
        ];
    }
}